function myFunction() {

    var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
    var Discount = parseFloat(document.getElementById("Discount").value);
    var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
    var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);
    var Amount_Collection = parseFloat(document.getElementById("inputName").value) || 0;

    // التحقق من عدم تجاوز مبلغ العمولة لمبلغ التحصيل
    /*if (Amount_Commission > Amount_Collection) {
        //alert('مبلغ العمولة لا يمكن أن يكون أكبر من مبلغ التحصيل.');
        document.getElementById("Amount_Commission").value = null;
    }
    //التحقق من عدم تجاوز مبلغ الخصم مبلغ العمولة
    else if (Discount > Amount_Collection) {
        //alert('مبلغ الخصم لا يمكن أن يكون أكبر من مبلغ العمولة.');
        document.getElementById("Discount").value = null;
    }else{*/
        var Amount_Commission2 = Amount_Commission - Discount;
        
            var intResults = Amount_Commission2 * Rate_VAT / 100;
            var intResults2 = parseFloat(intResults + Amount_Commission2);

            sumq = parseFloat(intResults).toFixed(2);

            sumt = parseFloat(intResults2).toFixed(2);

            document.getElementById("Value_VAT").value = sumq;

            document.getElementById("Total").value = sumt;

   // }
    
}
// إضافة الأحداث لتشغيل الدالة عند التغيير
document.getElementById("Amount_Commission").addEventListener("input", myFunction);
document.getElementById("Discount").addEventListener("input", myFunction);
document.getElementById("Rate_VAT").addEventListener("change", myFunction);

// تشغيل الدالة عند تحميل الصفحة لتحديث القيم الأولية
document.addEventListener("DOMContentLoaded", myFunction);