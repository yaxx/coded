 function loadState(master, dependant, nextDependant = '', url, nexturl='',cityDependant='',cityUrl='') {
    //  var country_id = $("select[name='nationality'] option:selected").attr('country_id');
    var country_id = $("select[name='" + master + "'] option:selected").attr('country_id');
    var state_id = $("select[name='" + dependant + "']").attr('state_id');
    var token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { country_id: country_id,state_id: state_id, _token: token },
        success: function(data) {
           //console.log(data);
            $("select[name='" + dependant + "']").html(''); 
            $("select[name='" + dependant + "']").html(data.options);
            if(state_id){
                 loadLga(dependant, nextDependant,cityDependant,nexturl, cityUrl);
            }
        }
    });
}

function loadLga(master, dependant, nextDependant = '', url, nexturl='') {
    var state_id = $("select[name='" + master + "'] option:selected").attr('state_id');
    var lga_id = $("select[name='" + dependant + "']").attr('lga_id');
    var token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { state_id: state_id,lga_id: lga_id, _token: token },
        success: function(data) {
           // console.log(data);
            $("select[name='" + dependant + "']").html('');
            $("select[name='" + dependant + "']").html(data.options);
            if(lga_id){
                loadCity(dependant, nextDependant,nexturl);
            }
            
        }
    });
}


function loadCity(master, dependant, url) {
     var lga_id = $("select[name='" + master + "'] option:selected").attr('lga_id');
     var city_id = $("select[name='" + dependant + "']").attr('city_id');
    var token = $("input[name='_token']").val();
     $.ajax({
        url: url,
        method: 'POST',
        data: { lga_id: lga_id,city_id: city_id, _token: token },
        success: function(data) {
           // console.log(data);
            $("select[name='" + dependant + "']").html('');
            $("select[name='" + dependant + "']").html(data.options);
        }
    });
} 

function loadBankBranches(url,current_branch_id='') {
    var bank_id = $("select[name='bank_id']").val();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { bank_id: bank_id, current_branch_id: current_branch_id, _token: token },
        success: function(data) {
           // console.log(data);
            $("select[name='bank_branch_id']").html('');
            $("select[name='bank_branch_id']").html(data.options);
        }
    });
}


function loadMinistries(url,current_ministry_id='',nexturl='',current_department_id='') {
    
        var current_category_id = $("select[name='current_category_id']").val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: { current_category_id: current_category_id, current_ministry_id:current_ministry_id, _token: token },
            success: function(data) {
                $("select[name='ministry_id']").html('');
                $("select[name='ministry_id']").html(data.options);
                loadDepartments(nexturl,current_department_id);
            }
        });
    }

function loadDepartments(url,current_department_id='') {

    var ministry_id = $("select[name='ministry_id']").val();
    var token = $("input[name='_token']").val();
    if(url != ''){
        $.ajax({
            url: url,
            method: 'POST',
            data: { ministry_id: ministry_id, current_department_id:current_department_id, _token: token },
            success: function(data) {
                $("select[name='department_id']").html('');
                $("select[name='department_id']").html(data.options);
            }
        });
    }
    else{
        $("select[name='department_id'").html('<option> -- Select Option --</option>');
    }
    
}


function loadGrades(url,current_salary_grade_id='') {

    var salary_structure_id = $("select[name='salary_structure_id']").val();
    var token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { salary_structure_id: salary_structure_id, current_salary_grade_id: current_salary_grade_id, _token: token },
        success: function(data) {
            $("select[name='current_grade_level_id']").html('');
            $("select[name='current_grade_level_id']").html(data.options);
        }
    });
}

function loadSelectOptionEdit(selobj, url, nameattr, valueattr, oldId, data, type) {
    $(selobj).empty();
    $.ajax({
        type: type,
        url: url,
        data: data,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(msg) {
            $.each(msg, function(i, obj) {
                if (obj[nameattr] === oldId) {
                    $(selobj).append(
                        $('<option></option>')
                        .val(obj[valueattr])
                        .html(obj[nameattr])
                        .attr("selected", true));
                } else {
                    $(selobj).append(
                        $('<option></option>')
                        .val(obj[valueattr])
                        .html(obj[nameattr]));
                }

            });
        },
        error: function(error) {
            alert("Failed to load " + oldId);
        }
    });
}

function loadSelectOptionEditByName(selobj, url, nameattr, valueattr, oldId, data, type) {
    $(selobj).empty();
    $.ajax({
        type: type,
        url: url,
        data: data,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(msg) {
            $.each(msg, function(i, obj) {
                if (obj[nameattr] === oldId) {
                    $(selobj).append(
                        $('<option></option>')
                        .val(obj[nameattr])
                        .html(obj[nameattr])
                        .attr("selected", true));
                } else {
                    $(selobj).append(
                        $('<option></option>')
                        .val(obj[nameattr])
                        .html(obj[nameattr]));
                }

            });
        },
        error: function(error) {
            alert("Failed to load " + oldId);
        }
    });
}

function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


