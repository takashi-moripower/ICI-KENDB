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
