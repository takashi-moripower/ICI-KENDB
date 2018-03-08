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

