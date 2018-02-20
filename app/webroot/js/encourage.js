$(function(){
    // 東工大連携IDの自動連携
    $("#EncourageResearcherNo").change(function() {
        $.get("/researchers/getJson/"+$(this).val(), function(data) {
            var researcher = jQuery.parseJSON(data);
            fillin(researcher);
        });
    });

    // 自動計算フィールド
    $('.autocalc').change(function(){
       auto_calc();
    });
    $('#recalc').click(function() {
	auto_calc();
	alert("再計算を実施しました");
    });

    // 課題番号の自動生成
    $("#EncourageRecruitingYear").change(function() {
        make_assignment_no();
    });
    $("#EncourageReceptionNo").change(function() {
        make_assignment_no();
    });

    // 日付文字列が変更になったらイベントを発生させる
    $("#EncourageRecruitStartDate_str").change(function() { make_interval(); });
    $("#EncourageRecruitEndDate_str").change(function() { make_interval(); });

    $('.autocalc').change();
});

function auto_calc() {
    var d1 = 0 + toNum($('#EncourageDetailGoodsCost')) +
    toNum($('#EncourageDetailTravelCost')) +
    toNum($('#EncourageDetailGratuityCost')) +
    toNum($('#EncourageDetailOtherCost'));
    $('#EncourageTotalPrimaryCost').val(d1.toString());

    var d2 = 0 + toNum($('#EncourageAchievementDetailGoodsCost')) +
    toNum($('#EncourageAchievementDetailTravelCost')) +
    toNum($('#EncourageAchievementDetailGratuityCost')) +
    toNum($('#EncourageAchievementDetailOtherCost'));
    $('#EncourageAchievementPrimaryCost').val(d2.toString());

    var d3 = 0 + toNum($('#EncourageAchievementCarriedDetailGoodsCost')) +
    toNum($('#EncourageAchievementCarriedDetailTravelCost')) +
    toNum($('#EncourageAchievementCarriedDetailGratuityCost')) +
    toNum($('#EncourageAchievementCarriedDetailOtherCost'));
    $('#EncourageAchievementCarriedPrimaryCost').val(d3.toString());

    var d4 = 0 + toNum($('#EncourageCarriedDetailGoodsCost')) +
    toNum($('#EncourageCarriedDetailTravelCost')) +
    toNum($('#EncourageCarriedDetailGratuityCost')) +
    toNum($('#EncourageCarriedDetailOtherCost'));
    $('#EncourageBalanceCarried').val(d4.toString());
}

function make_assignment_no() {
    var v1 = $("#EncourageRecruitingYear").val();
    var v2 = $("#EncourageReceptionNo").val();
    var s = "";
    if(v1 != "" && v2 != "") {
        s = v1 + "・" + v2;
    } else {
        s = "";
    }
    $("#EncourageAssignmentNo").val(s);
}

function make_interval() {
    var y1 = $("#EncourageRecruitStartDateYear").val();
    var m1 = $("#EncourageRecruitStartDateMonth").val();
    var d1 = $("#EncourageRecruitStartDateDay").val();
    var y2 = $("#EncourageRecruitEndDateYear").val();
    var m2 = $("#EncourageRecruitEndDateMonth").val();
    var d2 = $("#EncourageRecruitEndDateDay").val();
    if(y1 != "" && m1 != "" && d1 != "" && y2 != "" && m2 != "" && d2 !="") {
        var dd = ( (new Date(y2,m2,d2)) - (new Date(y1,m1,d1)) ) / (3600000*24);
        var mm = dd / 30;
        $('#EncourageNumberOfMonth').val(Math.floor(mm));
    }
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
	'cooperate_no', 'personal_no', 'researcher_no', 'researcher_name', 
	//'department', 
	'job_title', 'extension', 'email',
	'institute_code', 'school_code', 'course_code'];
    var dst = {};
    fs.forEach(function(field, index, a){
      dst[field] = field;
    });
    dst['researcher_name'] = 'facility_teacher';
    // dst['department'] = 'statistical_department';
    dst['extension'] = 'extension_researcher';
    dst['email'] = 'received_researcher_email';

    fs.forEach(function(field, index, a){
       var value = researcher[field];
       if(value){
         var cn = pascalCase("encourage_" + dst[field]);	// common.js
         $("#" + cn).val(value);
         $("#" + cn).addClass("autochangeresult");
       }
    });
}



