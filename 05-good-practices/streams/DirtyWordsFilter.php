<?php
// 사용자 정의 필터 클래스
class DirtyWordsFilter extends php_user_filter
{
    /**
     * @param resource $in       들어오는 양동이 부대
     * @param resource $out      나가는 양동이 부대
     * @param int      $consumed 소비되는 바이트 수
     * @param bool     $closing  스트림에 있는 마지막 양동이인가?
     */
    public function filter($in, $out, &$consumed, $closing)
    {
        $words = array('찌든때', '흙먼지', '기름때');
        $wordData = array();
        foreach ($words as $word) {
            $replacement = array_fill(0, mb_strlen($word), '*');
            $wordData[$word] = implode('', $replacement);
        }
        $bad = array_keys($wordData);
        $good = array_values($wordData);

        // 들어오는 양동이들을 각각 순회
        while ($bucket = stream_bucket_make_writeable($in)) {
            // 양동이 데이터에서 부정한 단어를 검열
            $bucket->data = str_replace($bad, $good, $bucket->data);

            // 소비된 데이터 합 증가
            $consumed += $bucket->datalen;

            // 양동이를 하류 부대로 보내기
            stream_bucket_append($out, $bucket);
        }

        return PSFS_PASS_ON;
    }
}
stream_filter_register('dirty_words_filter', 'DirtyWordsFilter');

// 사용자 정의 필터 사용
$handle = fopen('data.txt', 'rb');
stream_filter_append($handle, 'dirty_words_filter');
while (feof($handle) !== true) {
    echo fgets($handle);
}
fclose($handle);
