$(function(){
    // 債主データの自動連携
    $("#DonationContractObligation").change(function() {
        $.get("/obligations/getJsonByObligationCode/"+$(this).val(), function(data) {
            var obligation = jQuery.parseJSON(data);
            if (obligation != null) {
                $("#DonationContractObligationName").val(obligation.obligation_name);
                $("#DonationContractObligationName").addClass("autochangeresult");
                $("#DonationObligationName").val(obligation.obligation_name);
                $("#DonationObligationName").addClass("autochangeresult");
                $("#DonationObRepresentName").val(obligation.ob_represent_name);
                $("#DonationObRepresentName").addClass("autochangeresult");
                $("#DonationObJobTitle").val(obligation.ob_job_title);
                $("#DonationObJobTitle").addClass("autochangeresult");
                $("#DonationObPostalCode").val(obligation.ob_postal_code);
                $("#DonationObPostalCode").addClass("autochangeresult");
                $("#DonationObAddress").val(obligation.ob_address);
                $("#DonationObAddress").addClass("autochangeresult");
                $("#DonationObSection").val(obligation.ob_section);
                $("#DonationObSection").addClass("autochangeresult");
                $("#DonationObPersonInCharge").val(obligation.ob_section);
                $("#DonationObPersonInCharge").addClass("autochangeresult");
            }
        });
    });

    // プロジェクトデータの自動補完
    $("#DonationProjectCode").change(function() {
        $.get("/projects/getJsonByProjectCode/"+$(this).val(), function(data) {
            var project = jQuery.parseJSON(data);
            $("#DonationProjectCodeName").val(project.long_name);
            $("#DonationProjectCodeName").addClass("autochangeresult");
            //-- プロジェクトコード名だけを転記するよう変更
            //$("#DonationResearcherName").val(project.researcher_name);
            //$("#DonationResearcherName").addClass("autochangeresult");
            //$("#DonationResearcherNo").val(project.researcher_no);
            //$("#DonationResearcherNo").addClass("autochangeresult");
            //$("#DonationPersonalNo").val(project.personal_no);
            //$("#DonationPersonalNo").addClass("autochangeresult");
            //$("#DonationResearcherNo").change();
        });
    });



    // 東工大連携IDの自動連携
    $("#DonationResearcherNo").change(function() {
        $.get("/researchers/getJson/"+$(this).val(), function(data) {
            var researcher = jQuery.parseJSON(data);
            fillin(researcher);
        });
    });

    // 東工大連携IDの自動連携
    $("#DonationCooperateNo").change(function() {
        $.get("/researchers/getJsonByCooperateNo/"+$(this).val(), function(data) {
            var researcher = jQuery.parseJSON(data);
            fillin(researcher);
        });
    });

    // 共通経費有無がなしに設定された場合は、共通経費を0に設定
    $("#DonationCommonCostCheck").change(function() {
        var sel = $(this).val();
        if (sel == "なし") {
            $("#DonationCommonCost").val('0');
        }
    });


    // 自動計算フィールド
    $('.autocalc').change(function(){});
    $('.autocalc').change();
});

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
	'cooperate_no', 'personal_no',
	'researcher_no', 'researcher_name',
	'job_title', 'extension',
    	'post_no', 'email',
	'institute_code', 'school_code', 'course_code'];
    var dst = {};
    fs.forEach(function(field){dst[field] = field; });
   
    fs.forEach(function(field, index, a){
       var value =  researcher[field];
       if(value ){
       var cn = pascalCase("donation_" + dst[field]);	// common.js
       $("#" + cn).val(value);
       $("#" + cn).addClass("autochangeresult");
       }
    });
}


