﻿(function (jsPDFAPI) {
var callAddFont = function () {
this.addFileToVFS('TimeNewRoman_Normal-normal.ttf', font);
this.addFont('TimeNewRoman_Normal-normal.ttf', 'TimeNewRoman_Normal', 'normal');
};
jsPDFAPI.events.push(['addFonts', callAddFont])
 })(jsPDF.API);