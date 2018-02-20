$(function(){

    // 研究者番号の自動連携
    $("#MhlwResearchGrantResearcherNo").change(function() {
        $.get("/researchers/getJson/"+$(this).val(), function(data) {
            var researcher = jQuery.parseJSON(data);
            fillin(researcher);
        });
    });

    // 東工大連携ID
    $("#MhlwResearchGrantCooperateNo").change(function() {
        $.get("/researchers/getJsonByCooperateNo/"+$(this).val(), function(data) {
            var researcher = jQuery.parseJSON(data);
            fillin(researcher);
        });
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
    // 研究費合計
    var val1 = 0 + toNum($('#MhlwResearchGrantThisYearDirectCost')) +
    toNum($('#MhlwResearchGrantThisYearIndirectCost'));
    $('#MhlwResearchGrantThisYearApplicationAmountSum').val(val1.toString());

    var val2 = 0 + toNum($('#MhlwResearchGrantThisYearDirectAtDecision')) +
    toNum($('#MhlwResearchGrantThisYearIndirectAtDecision'));
    $('#MhlwResearchGrantThisYearTotalAtDecision').val(val2.toString());
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
	'cooperate_no', 'researcher_no','researcher_name',
	// 'statistical_department', 
	'statistical_job_title', 'email', 
	// 'notifying_department', 
	'personal_no', 'extension', 
	'fax', 'post_no',
	'institute_code', 'school_code', 'course_code'];
    var dst = {};
    fs.forEach(function(field, index, a){
       dst[field] = field;
    });
    dst['researcher_name'] = 'name';
    dst['statistical_job_title'] = 'statistical_job';

    fs.forEach(function(field, index, a){
       var value = researcher[field];
       if( value ) {
       	var cn = pascalCase("mhlw_research_grant_" + dst[field]);	// common.js
       	$("#" + cn).val(value);
       	$("#" + cn).addClass("autochangeresult");
	};
    });
}

