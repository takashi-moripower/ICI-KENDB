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