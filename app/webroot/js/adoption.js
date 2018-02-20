$(function(){
    // 東工大連携IDの自動連携
    $("#AdoptionResearcherNo").change(function() {
        $.get("/researchers/getJson/"+$(this).val(), function(data) {
            var researcher = jQuery.parseJSON(data);
            fillin(researcher);
        });
    });
    $('.autocalc').change(function(){
    	auto_calc();
    });
    $('.autocalc').change();

    $('#recalc').click(function() {
	auto_calc();
	alert("再計算を実施しました");
    });
});

// 自動計算する
function auto_calc() {
    // 自動計算フィールド
    var d1 = toNum($('#AdoptionCurrentPaymentDAppointment')) +
             toNum($('#AdoptionCurrentPaymentIAppointment'));
    $('#AdoptionCurrentPaymentSumAppointment').val(d1.toString());

    var d2 = toNum($('#AdoptionCurrentPaymentD')) +
             toNum($('#AdoptionCurrentPaymentI'));
    $('#AdoptionCurrentPaymentSum').val(d2.toString());

    var d3 = toNum($('#AdoptionDetailGoodsCost')) +
             toNum($('#AdoptionDetailTravelCost')) +
             toNum($('#AdoptionDetailGratuityCost')) +
             toNum($('#AdoptionDetailOtherCost'));
    $('#AdoptionTotalPrimaryCost').val(d3.toString());

    var d4 = toNum($('#AdoptionAchievementDetailGoodsCost')) +
             toNum($('#AdoptionAchievementDetailTravelCost')) +
             toNum($('#AdoptionAchievementDetailGratuityCost')) +
             toNum($('#AdoptionAchievementDetailOtherCost'));
    $('#AdoptionAchievementPrimaryCost').val(d4.toString());

    var d5 = toNum($('#AdoptionAchievementCarriedDetailGoodsCost')) +
             toNum($('#AdoptionAchievementCarriedDetailTravelCost')) +
             toNum($('#AdoptionAchievementCarriedDetailGratuityCost')) +
             toNum($('#AdoptionAchievementCarriedDetailOtherCost'));
    $('#AdoptionAchievementCarriedPrimaryCost').val(d5.toString());

    var d6 = toNum($('#AdoptionCarriedDetailGoodsCost')) +
             toNum($('#AdoptionCarriedDetailTravelCost')) +
             toNum($('#AdoptionCarriedDetailGratuityCost')) +
             toNum($('#AdoptionCarriedDetailOtherCost'));
    $('#AdoptionCarriedPrimaryCost').val(d6.toString());

    var d7 = toNum($('#AdoptionFixedAmountPrimaryCost')) +
             toNum($('#AdoptionFixedAmountIndirectCost'));
    $('#AdoptionFixedAmount').val(d7.toString());

    var d8 = toNum($('#AdoptionTurnbackAmountPrimaryCost')) +
             toNum($('#AdoptionTurnbackAmountIndirectCost'));
    $('#AdoptionTurnbackAmount').val(d8.toString());
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
        // 'department', 'notifying_department', 'statistical_department',
	'job_title','statistical_job_title',
	'extension', 'post_no', 'email', 'fax', 'personal_no',
	'institute_code', 'school_code', 'course_code']; 

      var dst = {};

      fs.forEach(function(field, index, a){ 
	dst[field] = field;
      });

      dst['researcher_name'] = 'name';
      dst['job_title'] = 'current_job_title';
      dst['statistical_job_title'] = 'statistical_job';

      fs.forEach(function(field, index, a){ 
	var prefix = "adoption_";
        var cn = pascalCase(prefix + dst[field]);      // common.js 
        var value = researcher[field]; 
        if( value ){
           $("#" + cn).val(value);
           $("#" + cn).addClass("autochangeresult"); 
        }
     });  
}

