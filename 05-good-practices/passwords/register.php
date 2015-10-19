<?php
try {
    // 이메일 유효성 검사
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (!$email) {
        throw new Exception('Invalid email');
    }

    /// 비밀번호 유효성 검사
    $password = filter_input(INPUT_POST, 'password');
    if (!$password || mb_strlen($password) < 8) {
        throw new Exception('비밀번호는 여덟 글자보다 길어야 합니다.');
    }

    // Create password hash
    $passwordHash = password_hash(
       $password,
       PASSWORD_DEFAULT,
       ['cost' => 12]
    );
    if ($passwordHash === false) {
        throw new Exception('비밀번호 해시가 일치하지 않습니다.');
    }

    // 사용자 계정 생성(예시 코드)
    // $user = new User();
    // $user->email = $email;
    // $user->password_hash = $passwordHash;
    // $user->save();

    // 로그인 페이지로 이동
    header('HTTP/1.1 302 Redirect');
    header('Location: /login.php');
} catch (Exception $e) {
    // 오류 보고
    header('HTTP/1.1 400 Bad request');
    echo $e->getMessage();
}
