<h3>ファイル状態</h3>
<table class="import-report">
    <tbody>
        <tr>
            <th class="w-50">ファイル名</th>
            <th class="w-50">ファイルサイズ</th>
        </tr>
        <tr>
            <td><?= $report['file']['name'] ?></td>
            <td class="text-right"><?= $report['file']['size'] ?> byte</td>
        </tr>
    </tbody>
</table>
<?php
if (empty($header)) {
    echo "<p>データの読み込みに失敗</p>";
    return;
}

echo $this->Element('import/report_header');

if (!empty($report['error']['body'])) {
    echo $this->Element('import/report_body_failed');
    return;
}

if (isset($report['register'])) {
    echo $this->Element('import/report_body_success');
}

if(isset($report['details'])){
    echo $this->Element('import/report_details');
}
?>

