function onay(onay) {
var onay = window.confirm("Seçtiğiniz kayıt silinecek?");
if (onay) {
return true;
}
else
return false;            
}

function ajaxduzelt(gelen) {
var gelen = unescape(gelen);
return gelen;
}



function Scripts2_GetObject(obj) {
    var theObj;
    if (document.all) {
        if (typeof obj == "string") {
            return document.all(obj);
        } else {
            return obj.style;
        }
    }
    if (document.getElementById) {
        if (typeof obj == "string") {
            return document.getElementById(obj);
        } else {
            return obj.style;
        }
    }
    return null;
}

function toCount(entrance, exit, text, characters) {
    //var entranceObj=Scripts2_GetObject(entrance);
    var entranceObj = entrance;
    var exitObj = Scripts2_GetObject(exit);
    var length = characters - entranceObj.value.length;
    if (length <= 0) {
        length = 0;
        text = '<span class="disable"> ' + text + ' </span>';
        entranceObj.value = entranceObj.value.substr(0, characters);
    }
    exitObj.innerHTML = text.replace("{CHAR}", length);
}



function ExtractPhone(obj, decimalPlaces, allowNegative, oFocus, focusLength) {
    var temp = obj.value;
    var reg0Str = '[0-9]*';
    reg0Str += '\\.?[0-9]*';
    reg0Str = allowNegative ? '^-?' + reg0Str : '^' + reg0Str;
    reg0Str = reg0Str + '$';
    var reg0 = new RegExp(reg0Str);
    //	if (reg0.test(temp)) return true;
    if (oFocus != null) {
        if (temp.length >= focusLength) {
            var objFocus = document.getElementById(oFocus);
            objFocus.focus();
        }
    }
    obj.value = temp;
}
function BlockNonNumbers(obj, e, objDigit, allowDecimal, allowNegative) {
    var key;
    var isCtrl = false;
    var keychar;
    var reg;

    if (window.event) {
        key = e.keyCode;
        isCtrl = window.event.ctrlKey
    }
    else if (e.which) {
        key = e.which;
        isCtrl = e.ctrlKey;
    }

    if (isNaN(key)) return true;

    keychar = String.fromCharCode(key);

    if (key == 8 || isCtrl) {
        return true;
    }
    reg = /\d/;
    var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
    var isFirstD = allowDecimal ? keychar == objDigit && obj.value.indexOf(objDigit) == -1 : false;
    return isFirstN || isFirstD || reg.test(keychar);
}

function ExtractNumber(obj, objDigit, objThousand, decimalPlaces, allowNegative) {
    var temp = obj.value; var reg0Str = '[0-9]*';
    if (decimalPlaces > 0) {
        reg0Str += '\\' + objDigit + '?[0-9]{0,' + decimalPlaces + '}';
    } else if (decimalPlaces < 0) {
        reg0Str += '\\' + objDigit + '?[0-9]*';
    }
    reg0Str = allowNegative ? '^-?' + reg0Str : '^' + reg0Str;
    reg0Str = reg0Str + '$';
    var reg0 = new RegExp(reg0Str);
    obj.value = addCommas(temp, objThousand);
    if (reg0.test(temp)) return true;


    var reg1Str = '[^0-9' + (decimalPlaces != 0 ? objDigit : '')
			+ (allowNegative ? '-' : '') + ']';
    var reg1 = new RegExp(reg1Str, 'g');
    temp = temp.replace(reg1, '');

    if (allowNegative) {

        var hasNegative = temp.length > 0 && temp.charAt(0) == '-';
        var reg2 = /-/g;
        temp = temp.replace(reg2, '');
        if (hasNegative) temp = '-' + temp;
    }

    if (decimalPlaces != 0) {
        var reg3 = /\./g;
        if (objDigit == ',') reg3 = /,/g;
        var reg3Array = reg3.exec(temp);
        if (reg3Array != null) {
            var reg3Right = temp.substring(reg3Array.index
			+ reg3Array[0].length);
            reg3Right = reg3Right.replace(reg3, '');
            reg3Right = decimalPlaces > 0 ? reg3Right.substring(0, decimalPlaces) : reg3Right;
            temp = temp.substring(0, reg3Array.index) + objDigit + reg3Right;
        }
    }
    temp = addCommas(temp,objThousand);
    obj.value = temp;
}

function addCommas(sValue,objThousand) {
    var sRegExp = new RegExp('(-?[0-9]+)([0-9]{3})');

    while (sRegExp.test(sValue)) {
        sValue = sValue.replace(sRegExp, '$1'+objThousand+'$2');
    }
    return sValue;
} 

function ismaxlength(obj) {
    var mlength = obj.getAttribute ? parseInt(obj.getAttribute("maxlen")) : ""
    if (obj.getAttribute && obj.value.length > mlength)
        obj.value = obj.value.substring(0, mlength)
}
//fires search button click event when pressed enter while search text box is active
function CallButtonClick(btnName, event) {
    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (keyCode == 13) {
        document.getElementById(btnName).click();
        return false;
    }
    else
        return true;
}

function changeFontSize(element, step) {
    step = parseInt(step, 10);

    var el = document.getElementById(element);
    var curFont = parseInt(el.style.fontSize, 10);
    var newFont = curFont + step;

    if (newFont >= 24) {newFont = 24}
    if (newFont <= 12) {newFont = 12}
    
    el.style.fontSize = newFont + 'px';

    return;
}
 

