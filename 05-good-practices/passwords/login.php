<?php
session_start();
try {
    // 요청 본문에서 이메일 주소 가져오기
    $email = filter_input(INPUT_POST, 'email');

    // 요청 본문에서 비밀번호 가져오기
    $password = filter_input(INPUT_POST, 'password');

    // 이메일 주소로 계정 찾기(예시 코드)
    $user = User::findByEmail($email);

    // 계정 비밀번호 해시로 비밀번호 검증하기
    if (password_verify($password, $user->password_hash) === false) {
        throw new Exception('올바르지 않은 비밀번호');
    }

    // 필요한 경우 해시 재생성하기(아래 내용 참고)
    $currentHashAlgorithm = PASSWORD_DEFAULT;
    $currentHashOptions = array('cost' => 15);
    $passwordNeedsRehash = password_needs_rehash(
        $user->password_hash,
        $currentHashAlgorithm,
        $currentHashOptions
    );
    if ($passwordNeedsRehash === true) {
        // 신규 비밀번호 해시 저장하기(예시 코드)
        $user->password_hash = password_hash(
            $password,
            $currentHashAlgorithm,
            $currentHashOptions
        );
        $user->save();
    }

    // 로그인 상태 세션 저장하기
    $_SESSION['user_logged_in'] = 'yes';
    $_SESSION['user_email'] = $email;

    // 프로필 페이지로 이동하기
    header('HTTP/1.1 302 Redirect');
    header('Location: /user-profile.php');
} catch (Exception $e) {
    header('HTTP/1.1 401 Unauthorized');
    echo $e->getMessage();
}
