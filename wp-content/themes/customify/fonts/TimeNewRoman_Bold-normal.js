﻿(function (jsPDFAPI) {
var callAddFont = function () {
this.addFileToVFS('TimeNewRoman_Bold-normal.ttf', font);
this.addFont('TimeNewRoman_Bold-normal.ttf', 'TimeNewRoman_Bold', 'normal');
};
jsPDFAPI.events.push(['addFonts', callAddFont])
 })(jsPDF.API);