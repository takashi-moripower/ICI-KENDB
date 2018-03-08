<h3>子ノード(明細)</h3>
<table class="import-report">
    <tbody>
        <tr>
            <th class="w-20">データ総数</th>
            <th class="w-20">更新成功</th>
            <th class="w-20">追加成功</th>
            <th class="w-20">失敗</th>
            <th class="w-20">処置不要</th>
        </tr>
        <tr>
            <td class="text-right"><?= $report['details']['update'] + $report['details']['insert'] + $report['details']['failed'] + $report['details']['none'] ?></td>
            <td class="text-right"><?= $report['details']['update'] ?></td>
            <td class="text-right"><?= $report['details']['insert'] ?></td>
            <td class="text-right"><?= $report['details']['failed'] ?></td>
            <td class="text-right"><?= $report['details']['none'] ?></td>
        </tr>
    </tbody>
</table>