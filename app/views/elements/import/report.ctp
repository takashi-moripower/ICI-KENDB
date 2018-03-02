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
<?php if (empty($header)): ?>
<p>
    ファイルの読み込みに失敗
</p>
<?php else: ?>
    <h3>ヘッダー</h3>
    <table class="import-report">
        <tbody>
            <?php if (!empty($report['error']['header'])): ?>
                <tr>
                    <th class="w-25">列</th>
                    <th class="w-25">値</th>
                    <th class="w-50">エラーメッセージ</th>
                </tr>
                <?php foreach ($report['error']['header'] as $id => $h_rep): ?>
                    <tr class="error">
                        <td>
                            <?= $id ?>列
                        </td>
                        <td>
                            <?= $h_rep['value'] ?>
                        </td>
                        <td>
                            <?= $h_rep['error'] ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <th class="w-50 text-right">項目数</th>
                    <th class="w-50">状態</th>
                </tr>
                <tr>
                    <td><?= $report['header']['count'] ?></td>
                    <td>正常</td>
                </tr>
            <?php endif; ?>            
        </tbody>
    </table>
<?php endif; ?>
<?php if (!empty($report['error']['body'])): ?>
    <h3>データ本体</h3>
    <table class="import-report">
        <tbody>
            <tr>
                <th class="w-25">行数</th>
                <th class="w-25">項目名</th>
                <th class="w-25">値</th>
                <th class="w-25">エラーメッセージ</th>
            </tr>
            <?php
            foreach ($report['error']['body'] as $id => $b_rep):
                foreach ($b_rep as $b_rep2):
                    ?>
                    <tr class="error">
                        <td class="text-right"><?= $id + 2 ?>行目</td>
                        <td><?= $b_rep2['label'] ?></td>
                        <td><?= $b_rep2['value'] ?></td>
                        <td><?= $b_rep2['message'] ?></td>
                    </tr>
                    <?php
                endforeach;
            endforeach;
            ?>
        </tbody>
    </table>
<?php elseif (isset($report['register'])): ?>
    <h3>データ本体</h3>
    <table class="import-report">
        <tbody>
            <tr>
                <th class="w-25">データ総数</th>
                <th class="w-25">更新成功</th>
                <th class="w-25">追加成功</th>
                <th class="w-25">失敗</th>
            </tr>
            <tr>
                <td class="text-right"><?= $report['register']['update'] + $report['register']['insert'] + $report['register']['failed'] ?></td>
                <td class="text-right"><?= $report['register']['update'] ?></td>
                <td class="text-right"><?= $report['register']['insert'] ?></td>
                <td class="text-right"><?= $report['register']['failed'] ?></td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>

