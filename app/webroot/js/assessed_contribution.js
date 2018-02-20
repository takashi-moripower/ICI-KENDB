$(function(){
    // 東工大連携IDの自動連携
    $("#AssessedContributionResearcherNo").change(function() {
        $.get("/researchers/getJson/"+$(this).val(), function(data) {
            var researcher = jQuery.parseJSON(data);
            fillin(researcher);
        });
    });

    // 学内課題番号
    $("#AssessedContributionTitleNo").change(function() {
        var v = $("#AssessedContributionTitleNo").val();
        if(v.length == 8) {
            var vv = v.substring(1, 8);
        }
        $("#AssessedContributionTitechAssignmentNo").val(vv);
        $("#AssessedContributionTitechAssignmentNo").addClass("autochangeresult");
    });

    // 自動計算フィールド
    $('.autocalc').change(function(){
       auto_calc();
    });
    $('.autocalc').change();

    $('#recalc').click(function() {
	auto_calc();
	alert("再計算を実施しました");
    });
});

function auto_calc() {

    var d1 = 0 + toNum($('#AssessedContributionDetailGoodCost')) +
    toNum($('#AssessedContributionDetailTripCost')) +
    toNum($('#AssessedContributionDetailRewardCost')) +
    toNum($('#AssessedContributionDetailOther'));
    $('#AssessedContributionPrimaryCost').val(d1.toString());

    var d2 = 0 + toNum($('#AssessedContributionChangeDetailGoodCost')) +
    toNum($('#AssessedContributionChangeDetailTripCost')) +
    toNum($('#AssessedContributionChangeDetailRewardCost')) +
    toNum($('#AssessedContributionChangeDetailOther'));
    $('#AssessedContributionDistributedAmountChange').val(d2.toString());

    var d3 = 0 + toNum($('#AssessedContributionExpenseDetailGoodsCost')) +
    toNum($('#AssessedContributionExpenseDetailTripCost')) +
    toNum($('#AssessedContributionExpenseDetailRewardCost')) +
    toNum($('#AssessedContributionExpenseDetailOther'));
    $('#AssessedContributionRealPrimaryCost').val(d3.toString());
    var d4 = d3 * 3 / 10;
    d4 = parseInt(d4);
    $('#AssessedContributionRealIndirectCost').val(d4.toString());

    var d5 = 0 + toNum($('#AssessedContributionPrimaryCost')) -
        toNum($('#AssessedContributionRealPrimaryCost'));
    $('#AssessedContributionTurnbackPaymentAmount').val(d5.toString());

    var d6 = 0 + toNum($('#AssessedContributionIndirectCost')) -
        toNum($('#AssessedContributionRealIndirectCost'));
    $('#AssessedContributionTurnbackIndirectAmount').val(d6.toString());
}

function set_rinfo(id) {
    $.get("/researchers/getJsonById/"+id, function(data) {
        var researcher = jQuery.parseJSON(data);
        fillin(researcher);
        $('#r_search_result').dialog('close');
    });
}

function fillin(researcher)
{
    if (researcher == null) {
        alert('該当する教員データがありません');
        return;
    }
    var fs = [
        'researcher_name', 'cooperate_no', 'personal_no','researcher_no',
	// 'department', 'major_name', 
	'job_title', 'extension', 'post_no',
	'fax', 'email',
        'institute_code', 'school_code', 'course_code'
    ];

    var dst = {};
    fs.forEach(function(field, index, a){
      dst[field] = field;
    });

    dst['researcher_name'] = 'co_researcher_name';
    dst['researcher_no'] = 'co_researcher_no';
    // dst['department'] = 'co_researcher_department';
    // dst['major_name'] = 'co_researcher_major_name';
    dst['job_title'] = 'co_researcher_job_type';

    fs.forEach(function(field, index, a){
       var value = researcher[field];
       if(value){
       var cn = pascalCase("assessed_contribution_" + dst[field]);	// common.js
          $("#" + cn).val(researcher[field]);
          $("#" + cn).addClass("autochangeresult");
       }
    });
}

