$(function(){

    // 東工大連携IDの自動連携
    $("#NedoJstOtherResearcherNo").change(function() {
        $.get("/researchers/getJson/"+$(this).val(), function(data) {
            var researcher = jQuery.parseJSON(data);
            fillin(researcher);
        });
    });

    // 自動計算フィールド
    $(".autocalc, #NedoJstOtherStatementSendDate1_str, #NedoJstOtherStatementSendDate2_str, #NedoJstOtherStatementSendDate3_str, #NedoJstOtherStatementSendDate4_str, #NedoJstOtherStatementSendDate5_str, #NedoJstOtherStatementSendDate6_str").change(function(){
        auto_calc();
    });
    $('.autocalc').change();

    $('#recalc').click(function() {
        auto_calc();
        alert("再計算を実施しました");
    });
});

function auto_calc() {

    // 請求金額
    var ch = 0 + toNum($('#NedoJstOtherCharge1')) +
    toNum($('#NedoJstOtherCharge2')) +
    toNum($('#NedoJstOtherCharge3')) +
    toNum($('#NedoJstOtherCharge4')) +
    toNum($('#NedoJstOtherCharge5')) +
    toNum($('#NedoJstOtherCharge6'));
    $('#NedoJstOtherCharge').val(ch.toString());

    // 請求済金額
    var ch2 = 0;
    if($('#NedoJstOtherStatementSendDate1Year').val() != "" &&
        $('#NedoJstOtherStatementSendDate1Month').val() != "" &&
        $('#NedoJstOtherStatementSendDate1Date').val() != "") {
        ch2 += toNum($('#NedoJstOtherCharge1'));
    }
    if($('#NedoJstOtherStatementSendDate2Year').val() != "" &&
        $('#NedoJstOtherStatementSendDate2Month').val() != "" &&
        $('#NedoJstOtherStatementSendDate2Date').val() != "") {
        ch2 += toNum($('#NedoJstOtherCharge2'));
    }
    if($('#NedoJstOtherStatementSendDate3Year').val() != "" &&
        $('#NedoJstOtherStatementSendDate3Month').val() != "" &&
        $('#NedoJstOtherStatementSendDate3Date').val() != "") {
        ch2 += toNum($('#NedoJstOtherCharge3'));
    }
    if($('#NedoJstOtherStatementSendDate4Year').val() != "" &&
        $('#NedoJstOtherStatementSendDate4Month').val() != "" &&
        $('#NedoJstOtherStatementSendDate4Date').val() != "") {
        ch2 += toNum($('#NedoJstOtherCharge4'));
    }
    if($('#NedoJstOtherStatementSendDate5Year').val() != "" &&
        $('#NedoJstOtherStatementSendDate5Month').val() != "" &&
        $('#NedoJstOtherStatementSendDate5Date').val() != "") {
        ch2 += toNum($('#NedoJstOtherCharge5'));
    }
    if($('#NedoJstOtherStatementSendDate6Year').val() != "" &&
        $('#NedoJstOtherStatementSendDate6Month').val() != "" &&
        $('#NedoJstOtherStatementSendDate6Date').val() != "") {
        ch2 += toNum($('#NedoJstOtherCharge6'));
    }
    $('#NedoJstOtherChargedAmount').val(ch2.toString());

    // 請求残高
    var ch3 = 0 + toNum($('#NedoJstOtherCharge')) -
    toNum($('#NedoJstOtherChargedAmount'));
    $('#NedoJstOtherClaimedBalance').val(ch3.toString());


    // 研究費合計
    var val1 = 0 + toNum($('#NedoJstOtherPhotothermicCost')) +
    toNum($('#NedoJstOtherOtherCost'));
    $('#NedoJstOtherResearchExpense').val(val1.toString());

    // 直接経費合計
    var val2 = 0 + toNum($('#NedoJstOtherReconsignmentCost')) +
    toNum($('#NedoJstOtherGeneralAdministrationCost')) +
    val1;
    $('#NedoJstOtherTotalPrimaryCost').val(val2.toString());

    // 間接経費
    var val6 = toNum($('#NedoJstOtherLaboEarnings')) +
    toNum($('#NedoJstOtherTitechEarnings'));
    $('#NedoJstOtherIndirectCost').val(val6.toString());


    // 当該年度の受け入れ金額
    var val3 = val2 + val6;
    $('#NedoJstOtherThisYearReceptionAmount').val(val3.toString());

    // 複数年度計算
    var val4 = toNum($('#NedoJstOtherPluralContractAmount1')) +
    toNum($('#NedoJstOtherPluralContractAmount2')) +
    toNum($('#NedoJstOtherPluralContractAmount3')) +
    toNum($('#NedoJstOtherPluralContractAmount4')) +
    toNum($('#NedoJstOtherPluralContractAmount5')) +
    toNum($('#NedoJstOtherPluralContractAmount6')) +
    toNum($('#NedoJstOtherPluralContractAmount7')) +
    toNum($('#NedoJstOtherPluralContractAmount8')) +
    toNum($('#NedoJstOtherPluralContractAmount9')) +
    toNum($('#NedoJstOtherPluralContractAmount10'));
    $('#NedoJstOtherTotalReceptionAmount').val(val4.toString());

	// 請求書残高
	var val7 = toNum($('#NedoJstOtherIncome1')) +
		toNum($('#NedoJstOtherIncome2')) +
		toNum($('#NedoJstOtherIncome3')) +
		toNum($('#NedoJstOtherIncome4')) +
		toNum($('#NedoJstOtherIncome5')) +
		toNum($('#NedoJstOtherIncome6'));
	$('#NedoJstOtherStatementAmount').val(val3 - val7);

    // 残高
    val5 = val3 - toNum($('#NedoJstOtherReportedAmount'));
    $('#NedoJstOtherBalance').val(val5.toString());
}

function set_rinfo(id) {
    $.get("/researchers/getJsonById/"+id, function(data) {
        var researcher = jQuery.parseJSON(data);
        fillin(researcher);
        $('#r_search_result').dialog('close');
    });
}

function fillin(researcher) {
    if (researcher == null) {
        alert('該当する教員データがありません');
        return;
    }

    var fs = [
	'cooperate_no', 'researcher_no', 'researcher_name',
	// 'department', 
	'job_title', 'email',
	'institute_code', 'school_code', 'course_code'];
    var dst = {};
    fs.forEach(function(field, index, a){ dst[field] = field; });

    fs.forEach(function(field, index, a){
       var value = researcher[field];
       if(value){
       	var cn = pascalCase("nedo_jst_other_" + dst[field]);	// common.js
       	$("#" + cn).val(value);
       	$("#" + cn).addClass("autochangeresult");
	};
    });
}

