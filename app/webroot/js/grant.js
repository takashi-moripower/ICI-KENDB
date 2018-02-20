$(function(){

    // 東工大連携IDの自動連携
    $("#GrantResearcherNo").change(function() {
        $.get("/researchers/getJson/"+$(this).val(), function(data) {
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
    var val1 = 0 + toNum($('#GrantPrimaryCost')) +
    toNum($('#GrantIndirectCost')) +
    toNum($('#GrantGeneralAdministrationCost'));
    $('#GrantGrantThisYearReceptionAmount').val(val1.toString());
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
        'cooperate_no', 'researcher_name', 'researcher_no', 
	// 'department', 
	'job_title', 'institute_code', 'school_code', 'course_code'];
    var dst = {};
    fs.forEach(function(field, index, a){ dst[field] = field; });
    dst['researcher_name'] =  'represent_researcher_name';
    
    fs.forEach(function(field, index, a){
       var value = researcher[field];	
       if (value){
        var cn = pascalCase('grant_' + dst[field]);	// common.js
       	$("#" + cn).val(value);
       	$("#" + cn).addClass("autochangeresult");
       }
    });
}

