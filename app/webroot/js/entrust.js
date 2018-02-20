$(function(){
    // 東工大連携IDの自動連携
    $("#EntrustResearcherNo").change(function() {
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

    var formula = toNum($('#EntrustFormula'));

    // 前年度以前納付値
    var former = 0 + toNum($('#EntrustFormerPaymentD')) +
    toNum($('#EntrustFormerPaymentR')) +
    toNum($('#EntrustFormerPaymentI'));
    $('#EntrustFormerPaymentSum').val(former.toString());

    // 本年度
    var currentD = 0 + toNum($('#EntrustCurrentPaymentDr')) +
    toNum($('#EntrustCurrentPaymentU')) +
    toNum($('#EntrustCurrentPaymentG'));
    $('#EntrustCurrentPaymentD').val(currentD.toString());

    var current = currentD +
    toNum($('#EntrustCurrentPaymentR')) +
    toNum($('#EntrustCurrentPaymentI'));
    $('#EntrustCurrentPaymentSum').val(current.toString());

    // 本年度研究室配分
    if (formula == 1) {
        var currentR = 0 + toNum($('#EntrustCurrentPaymentDr')) +
        Math.floor((toNum($('#EntrustCurrentPaymentR')) / 401400) * 301400);
        $('#EntrustCurrentPaymentAlloc').val(currentR.toString());
    }

    // 次年度
    var nextval1 = 0 + toNum($('#EntrustNext1PaymentD')) +
    toNum($('#EntrustNext1PaymentR')) +
    toNum($('#EntrustNext1PaymentI'));
    $('#EntrustNext1PaymentSum').val(nextval1.toString());

    // 次々年度
    var nextval2 = 0 + toNum($('#EntrustNext2PaymentD')) +
    toNum($('#EntrustNext2PaymentR')) +
    toNum($('#EntrustNext2PaymentI'));
    $('#EntrustNext2PaymentSum').val(nextval2.toString());

    // 次々々年度
    var nextval3 = 0 + toNum($('#EntrustNext3PaymentD')) +
    toNum($('#EntrustNext3PaymentR')) +
    toNum($('#EntrustNext3PaymentI'));
    $('#EntrustNext3PaymentSum').val(nextval3.toString());

    // 次々々々年度
    var nextval4 = 0 + toNum($('#EntrustNext4PaymentD')) +
    toNum($('#EntrustNext4PaymentR')) +
    toNum($('#EntrustNext4PaymentI'));
    $('#EntrustNext4PaymentSum').val(nextval4.toString());

    // 直・研・間合計
    var d = 0 + toNum($('#EntrustFormerPaymentD')) +
    toNum($('#EntrustCurrentPaymentD')) +
    toNum($('#EntrustNext1PaymentD')) +
    toNum($('#EntrustNext2PaymentD')) +
    toNum($('#EntrustNext3PaymentD')) +
    toNum($('#EntrustNext4PaymentD'));
    $('#EntrustDTotal').val(d.toString());
    var r = 0 + toNum($('#EntrustFormerPaymentR')) +
    toNum($('#EntrustCurrentPaymentR')) +
    toNum($('#EntrustNext1PaymentR')) +
    toNum($('#EntrustNext2PaymentR')) +
    toNum($('#EntrustNext3PaymentR')) +
    toNum($('#EntrustNext4PaymentR'));
    $('#EntrustRTotal').val(r.toString());
    var i = 0 + toNum($('#EntrustFormerPaymentI')) +
    toNum($('#EntrustCurrentPaymentI')) +
    toNum($('#EntrustNext1PaymentI')) +
    toNum($('#EntrustNext2PaymentI')) +
    toNum($('#EntrustNext3PaymentI')) +
    toNum($('#EntrustNext4PaymentI'));
    $('#EntrustITotal').val(i.toString());
    var total = d + r + i;
    $('#EntrustTotalAmount').val(total.toString());
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
	'job_title', 'extension', 'post_no', 'email',
	'institute_code', 'school_code', 'course_code'];
    var dst = {};
    fs.forEach(function(field){dst[field] = field; });
   
    fs.forEach(function(field, index, a){
       var value =  researcher[field];
       if(value ){
       var cn = pascalCase("entrust_" + dst[field]);	// common.js
       $("#" + cn).val(value);
       $("#" + cn).addClass("autochangeresult");
       }
    });
}
