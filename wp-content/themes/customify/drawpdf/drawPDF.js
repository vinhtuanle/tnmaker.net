var drawPDF = function () {
    var doc = new jsPDF();
    // add font
    var w = 210;
    var h = 297;
    var form = 100;
    var sentence = 100;
    var alpha = 137;
    // init();
    // drawBoundRect();
    // drawInsideRect(form);
    // drawCommonText(form,style);
    // drawRectSbdMade(form, 0);
    // drawRectSbdMade(form, 1)
    // drawSbdMade(form);
    // drawLabelNumber(form);
    // drawCircle(form, sentence);
    // drawLabel(form, 0);
    // drawLabel(form, 1);                                                                               
    this.init = function (f, s, a) {
        w = 210;
        h = 297;
        form = f;
        sentence = s;
        alpha = a;
        alert("init " + form + " " + sentence + " " + alpha);

    }
    this.savePDF = function (form) {
        doc.save("phieu-trac-nghiem.pdf");
        alert("saved");
    }
    this.getOutput = function()
    {
        return doc.output('datauristring',{"filename":"phieu-trac-nghiem.pdf"});
    }
    this.drawBoundRect = function () {
        var widthRect = 5.465;
        doc.rect(29.299 - widthRect / 2, h - 260.594 - widthRect / 2, widthRect, widthRect, 'F');
        doc.rect(184.396 - widthRect / 2, h - 260.594 - widthRect / 2, widthRect, widthRect, 'F');
        doc.rect(29.299 - widthRect / 2, h - 146.087 - widthRect / 2, widthRect, widthRect, 'F');
        doc.rect(184.396 - widthRect / 2, h - 146.087 - widthRect / 2, widthRect, widthRect, 'F');
        doc.rect(29.299 - widthRect / 2, h - 31.464 - widthRect / 2, widthRect, widthRect, 'F');
        doc.rect(184.396 - widthRect / 2, h - 31.464 - widthRect / 2, widthRect, widthRect, 'F');

    }
    this.drawInsideRect = function (form) {
        var widthRect = 0;
        if (form == 20) {
            widthRect = 3.963;
            doc.rect(106.796 - widthRect / 2, h - 199.749 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(68.12 - widthRect / 2, h - 119.367 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(106.796 - widthRect / 2, h - 119.367 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(145.472 - widthRect / 2, h - 119.367 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(106.796 - widthRect / 2, h - 38.985 - widthRect / 2, widthRect, widthRect, 'F');
        } else if (form == 40) {
            widthRect = 3.963;
            doc.rect(87.807 - widthRect / 2, h - 199.792 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(126.483 - widthRect / 2, h - 199.792 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(87.807 - widthRect / 2, h - 119.411 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(126.483 - widthRect / 2, h - 119.411 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(87.807 - widthRect / 2, h - 39.03 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(126.483 - widthRect / 2, h - 39.03 - widthRect / 2, widthRect, widthRect, 'F');
        } else if (form == 60) {
            widthRect = 3.532;
            doc.rect(72.962 - widthRect / 2, h - 182.3 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(107.187 - widthRect / 2, h - 182.3 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(141.412 - widthRect / 2, h - 182.3 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(72.962 - widthRect / 2, h - 110.653 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(107.187 - widthRect / 2, h - 110.653 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(141.412 - widthRect / 2, h - 110.653 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(72.962 - widthRect / 2, h - 39.006 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(107.187 - widthRect / 2, h - 39.006 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(141.412 - widthRect / 2, h - 39.006 - widthRect / 2, widthRect, widthRect, 'F');
        } else if (form == 100) {
            widthRect = 3.0822
            doc.rect(77.18 - widthRect / 2, h - 226.829 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(106.859 - widthRect / 2, h - 226.829 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(136.537 - widthRect / 2, h - 226.829 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(77.18 - widthRect / 2, h - 164.494 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(106.859 - widthRect / 2, h - 164.494 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(136.537 - widthRect / 2, h - 164.494 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(77.18 - widthRect / 2, h - 102.16 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(106.859 - widthRect / 2, h - 102.16 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(136.537 - widthRect / 2, h - 102.16 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(77.18 - widthRect / 2, h - 39.826 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(106.859 - widthRect / 2, h - 39.826 - widthRect / 2, widthRect, widthRect, 'F');
            doc.rect(136.537 - widthRect / 2, h - 39.826 - widthRect / 2, widthRect, widthRect, 'F');
        }
    }
    this.drawRectTextFromHTML = function (isDrawRect, left, top, right, bottom, content, fontSize, isBold, isItalic) {
        var withRect = right - left;
        var heightRect = bottom - top;
        // content rect
        if (isDrawRect) {
            doc.setDrawColor(0);
            doc.setFillColor(255, 255, 255);
            doc.roundedRect(left, top, withRect, heightRect, 3, 3, 'FD');
        }
        // content text
        doc.setTextColor(0);
        doc.setFontSize(fontSize);
        doc.setFont("UVNAnhHai_R");
        doc.setFontStyle("normal");
        doc.text(content, left + 5, top + (heightRect / 2));
    }
    this.drawCommonText = function (form, config) {
        // so giao duc dao tao
        drawRectTextFromHTML(false, 40, 21, 85, 25, config.style[0].content, "times", 10, true, true);

        // ten truong 
        drawRectTextFromHTML(false, 33, 25, 97, 32, "TRUONG THPT NAM DUYEN HA", "times", 10, true, true);

        // phieu tra loi trac nghiem
        drawRectTextFromHTML(false, 103, 20, 182, 32, "PHIEU TRA LOI TRAC NGHIEM", "times", 13, true, false);

        // text kiem tra mon 
        drawRectTextFromHTML(false, 50, 33, 110, 42, "KIEM TRA MON: ", "times", 13, true, false);

        // text thoi gian
        drawRectTextFromHTML(false, 120, 33, 165, 42, "THOI GIAN: ", "times", 13, true, false);

        // text ho va ten
        drawRectTextFromHTML(false, 40, 45, 75, 57, "HO VA TEN : ", "times", 13, true, false);

        // rect ho va ten
        drawRectTextFromHTML(true, 77, 42, 130, 57, "", "times", 13, true, false);

        // text lop
        drawRectTextFromHTML(false, 135, 45, 170, 57, "LOP: ........... ", "times", 13, true, false);

        if (form != 100) {
            // rect luu y
            drawRectTextFromHTML(true, 42, 61, 120, 86, "LUU Y:", "times", 13, true, false);

            // rect diem so
            drawRectTextFromHTML(true, 127, 61, 160, 86, "", "times", 13, true, false);

            // text diem so
            drawRectTextFromHTML(false, 128, 76, 170, 57, "DIEM SO", "times", 13, true, false);


        }
    }
    this.drawCopyRight = function()
    {
        // copy right
        doc.setFontSize(8);
        doc.setFont("times");
        doc.setFontStyle("italicbold");
        doc.text('© Copyright by TN Team', 94, 270.345);
    }
    this.drawSbdMade = function (form) {
        var lineWidth = 0.178;
        var startXText = 0;
        var startYText = 0;
        var startXRect = 0;
        var startYRect = 0;
        var startXNotice = 0;
        var startYNotice = 0
        var fontSize = 0;
        var widthRect = 0;
        var distanceX = 0;
        var distanceX1 = 0;
        var startXNotice = 0;
        var startYNotice = 0;
        var distanceNotice = 0;
        var paddingXNotice = 0;
        var paddingYNocice = 0;
        if (form == 20) {
            startXText = 71.262;
            startYText = h - 205.04;
            startXRect = 68.456;
            startYRect = 93.345;
            fontSize = 11;
            widthRect = 5.345;
            distanceX = 43.033;
            distanceX1 = 43.933;
            startXNotice = 130.606;
            startYNotice = 100.679;
            distanceNotice = 72.783;
            paddingXNotice = 4.389;
            paddingYNocice = 68.658;
        } else if (form == 40) {
            startXText = 52.262;
            startYText = h - 205.04;
            startXRect = 49.456;
            startYRect = 93.345;
            fontSize = 11;
            widthRect = 5.345;
            distanceX = 42.133;
            distanceX1 = 43.933;
            startXNotice = 112.406;
            startYNotice = 100.679;
            distanceNotice = 72.783;
            paddingXNotice = 4.189;
            paddingYNocice = 68.658;

        } else if (form == 60) {
            startXText = 41.962;
            startYText = h - 189.04;
            startXRect = 37.956;
            startYRect = 110.345;
            fontSize = 9;
            widthRect = 4.945;
            distanceX = 36.833;
            distanceX1 = 39.033;
            startXNotice = 94.006;
            startYNotice = 117.779;
            distanceNotice = 65.583;
            paddingXNotice = 4.089;
            paddingYNocice = 58.658;
        } else if (form == 100) {
            startXText = 48.962;
            startYText = h - 232.04;
            startXRect = 46.456;
            startYRect = 66.645;
            fontSize = 9;
            widthRect = 4.445;
            distanceX = 32.533;
            distanceX1 = 34.033;
            startXNotice = 95.506;
            startYNotice = 72.779;
            distanceNotice = 56.999;
            paddingXNotice = 3.889;
            paddingYNocice = 53.958;
        }
        // so bao danh
        doc.setFontSize(fontSize);
        doc.setFont("times");
        doc.setFontStyle("bold");
        doc.text('SO BAO DANH', startXText, startYText);
        // made
        doc.text('MA DE', startXText + distanceX, startYText);

        // rect so bao danh
        doc.setDrawColor(0);
        doc.setFillColor(255, 255, 255);
        for (var i = 0; i < 6; i++) {
            doc.roundedRect(startXRect + i * widthRect, startYRect, widthRect, widthRect, 0, 0, 'FD');
        }

        // rect ma de
        doc.setDrawColor(0);
        doc.setFillColor(255, 255, 255);
        for (var i = 0; i < 3; i++) {
            doc.roundedRect(startXRect + distanceX1 + i * widthRect, startYRect, widthRect, widthRect, 0, 0, 'FD');
        }
        // to kin so bao danh vs ma de
        doc.setLineWidth(lineWidth);
        doc.line(startXNotice, startYNotice, startXNotice, startYNotice + distanceNotice);
        doc.setFontSize(fontSize);
        doc.setFont("times");
        doc.setFontStyle("bold");
        doc.text(startXNotice + paddingXNotice, startYNotice + paddingYNocice, 'TO KIN SO BAO DANH VA MA DE', null, 90);
    }
    this.drawLabelNumber = function (form) {
        // draw abcd va so thu tu
        var startX = 0;
        var startY = 0;
        var distanceX = 0;
        var distanceY = 0;
        var widthArea = 0;
        var heightArea = 0;
        var fontSizeAbc = 0;
        var fontSizeNumber = 0;
        var area = 0;
        if (form == 20) {
            distanceX = 75.168 - 68.908;
            distanceY = 134.389 - 127.085;
            widthArea = 113.611 - 75.111;
            fontSizeAbc = 13;
            fontSizeNumber = 13;
            area = 2;
        } else if (form == 40) {
            distanceX = 139.801 - 133.541;
            distanceY = 134.389 - 127.085;
            widthArea = 133.429 - 94.671;
            heightArea = 199.763 - 119.553;
            fontSizeAbc = 13;
            fontSizeNumber = 13;
            area = 4;

        } else if (form == 60) {
            distanceX = 119.054 - 113.474;
            distanceY = 176.412 - 169.859;
            widthArea = 147.683 - 113.426;
            heightArea = 182.166 - 110.633;
            fontSizeAbc = 12;
            fontSizeNumber = 12;
            area = 6;

        } else if (form == 100) {
            distanceX = 116.777 - 111.907;
            distanceY = 221.399 - 215.738;
            widthArea = 141.729 - 111.873;
            heightArea = 226.618 - 164.378;
            fontSizeAbc = 11;
            fontSizeNumber = 11;
            area = 10;
        }
        for (var i = 0; i < area; i++) {
            if (form == 20) {
                if (i == 1) {
                    startX = 111.91;
                    startY = h - 117.83;
                } else if (i == 0) {
                    startX = 111.91 - widthArea;
                    startY = h - 117.83;
                }

            } else if (form == 40) {
                if (i == 0 || i == 3) {
                    startX = 132.029;
                }
                else {
                    startX = 132.029 - (3 - i) * widthArea;
                }
                if (i == 0) {
                    startY = h - 198.363;
                } else {
                    startY = h - 118.053;
                }

            } else if (form == 60) {
                if (i % 4 == 0) {
                    startX = 111.726;
                } else if (i % 4 == 1) {
                    startX = 112.026 + widthArea;
                } else {
                    startX = startX - (4 - i) * widthArea;
                }
                if (i < 2) {
                    startY = h - 181.066;
                } else {
                    startY = h - 109.233;
                }

            } else if (form == 100) {
                if (i % 4 == 0) {
                    startX = 110.559;
                } else if (i % 4 == 1) {
                    startX = 110.559 + widthArea;
                } else if (i % 4 == 2) {
                    startX = 110.559 - 2 * widthArea;
                } else {
                    startX = 110.559 - 1 * widthArea;
                }
                if (i < 2) {
                    startY = h - 225.599;
                } else if (i < 6) {
                    startY = h - 163.194;
                } else {
                    startY = h - 100.76;
                }
            }

            doc.setFont("times");
            doc.setFontStyle("bold");
            doc.setFontSize(fontSizeAbc);
            doc.text(startX + 0 * distanceX, startY, 'A');
            doc.text(startX + 1 * distanceX, startY, 'B');
            doc.text(startX + 2 * distanceX, startY, 'C');
            doc.text(startX + 3 * distanceX, startY, 'D');
            doc.setFont("times");
            doc.setFontStyle("bold");
            doc.setFontSize(fontSizeNumber);
            for (var j = 0; j < 10; j++) {
                if ((10 * i) + j + 1 == 10) {
                    doc.text(startX - 1.3 * distanceX, startY + (j + 1) * distanceY, (10 * i) + j + 1 + '');
                } else if ((10 * i) + j + 1 < 10) {
                    doc.text(startX - 1.07 * distanceX, startY + (j + 1) * distanceY, (10 * i) + j + 1 + '');
                } else if ((10 * i) + j + 1 == 100) {
                    doc.text(startX - 1.60 * distanceX, startY + (j + 1) * distanceY, (10 * i) + j + 1 + '');
                }
                else {
                    doc.text(startX - 1.2 * distanceX, startY + (j + 1) * distanceY, (10 * i) + j + 1 + '');
                }
            }
        }

    }
    this.drawRectSbdMade = function (form, area) {
        var widthRect = 0;
        var heightRect = 0;
        var startX = 0;
        var startY = 0;
        if (form == 20) {
            if (area == 0) {
                widthRect = 39.492;
                heightRect = 73.049;
                startX = 84.637 - widthRect / 2;
                startY = h - 159.69 - heightRect / 2
            } else if (area == 1) {
                widthRect = 26.736;
                heightRect = 73.049;
                startX = 123.666 - widthRect / 2;
                startY = h - 159.712 - heightRect / 2
            }
        } else if (form == 40) {
            if (area == 0) {
                widthRect = 39.118;
                heightRect = 73.483;
                startX = 65.884 - widthRect / 2;
                startY = h - 159.673 - heightRect / 2
            } else if (area == 1) {
                widthRect = 27.191;
                heightRect = 73.483;
                startX = 104.753 - widthRect / 2;
                startY = h - 159.673 - heightRect / 2
            }
        } else if (form == 60) {
            if (area == 0) {
                widthRect = 34.781;
                heightRect = 65.499;
                startX = 52.944 - widthRect / 2;
                startY = h - 146.384 - heightRect / 2
            } else if (area == 1) {
                widthRect = 24.33;
                heightRect = 65.499;
                startX = 87.769 - widthRect / 2;
                startY = h - 146.384 - heightRect / 2
            }
        }
        else if (form == 100) {
            if (area == 0) {
                widthRect = 30.715;
                heightRect = 57.156;
                startX = 59.935 - widthRect / 2;
                startY = h - 195.655 - heightRect / 2
            } else if (area == 1) {
                widthRect = 21.504;
                heightRect = 57.156;
                startX = 90.279 - widthRect / 2;
                startY = h - 195.655 - heightRect / 2
            }
        }
        doc.setDrawColor(0);
        doc.setFillColor(255, 255, 255);
        doc.roundedRect(startX, startY, widthRect, heightRect, 1, 1, 'FD');
    }
    this.drawLabel = function (form, area) {
        var radius = 0;
        var startX = 0;
        var startY = 0;
        var distanceX = 0;
        var distanceY = 0;
        var fontSize;
        var col = 0;
        if (form == 20) {
            fontSize = 8;
            radius = 4.897 / 2;
            if (area == 0) {
                col = 6;
                startX = 68.358;
                startY = h - 192.947 + radius / 2;
            }
            else if (area == 1) {
                col = 3;
                startX = 113.337;
                startY = h - 192.947 + radius / 2;
            }
            distanceX = 139.801 - 133.541;
            distanceY = 134.389 - 127.085;
        } else if (form == 40) {
            fontSize = 8;
            radius = 4.897 / 2;
            if (area == 0) {
                col = 6;
                startX = 49.317;
                startY = h - 193.347 + radius / 2;
            }
            else if (area == 1) {
                col = 3;
                startX = 94.395;
                startY = h - 193.347 + radius / 2;
            }
            distanceX = 139.801 - 133.541;
            distanceY = 134.389 - 127.085;
        }
        else if (form == 60) {
            fontSize = 7;
            radius = 4.364 / 2;
            if (area == 0) {
                col = 6;
                startX = 38.513;
                startY = h - 176.396 + radius / 2;
            }
            else if (area == 1) {
                col = 3;
                startX = 78.296;
                startY = h - 176.396 + radius / 2;
            }
            distanceX = 119.054 - 113.474;
            distanceY = 176.412 - 169.859;
        }
        else if (form == 100) {
            fontSize = 6;
            radius = 3.809 / 2;
            if (area == 0) {
                col = 6;
                startX = 47.106;
                startY = h - 221.607 + radius / 2;
            }
            else if (area == 1) {
                col = 3;
                startX = 81.924;
                startY = h - 221.607 + radius / 2;
            }
            distanceX = 116.777 - 111.907;
            distanceY = 221.399 - 215.738;
        }

        for (var i = 0; i < 10; i++) {
            for (var j = 0; j < col; j++) {
                // draw label
                doc.setFontSize(fontSize);
                doc.setFont("times");
                doc.setTextColor(157)
                doc.text(i + '', startX + j * distanceX, startY + i * distanceY);
            }
        }

    }
    this.drawCircle = function (form, sentence) {
        var radius = 0;
        var lineWidth = 0.178;
        var distanceX = 0;
        var distanceY = 0;
        var startX = 0;
        var startY = 0;
        doc.setLineWidth(lineWidth);
        doc.setFillColor(255, 255, 255);
        doc.setDrawColor(255 - alpha);

        if (form == 20) {
            radius = 4.897 / 2;
            distanceX = 75.168 - 68.908;
            distanceY = 134.389 - 127.085;
            for (var i = 0; i < 4; i++) {
                var row = 10;
                var col = 4;
                if (i == 0) {
                    col = 6;
                    startX = 68.906;
                    startY = h - 192.806;
                }
                else if (i == 1) {
                    col = 3;
                    startX = 113.984;
                    startY = h - 192.806;
                }
                else if (i == 2) {
                    startX = 75.376;
                    startY = h - 112.175;
                }
                else if (i == 3) {
                    startX = 113.989;
                    startY = h - 112.175;
                }
                for (var m = 0; m < row; m++) {
                    if (10 * i + m < sentence + 20) {
                        for (var n = 0; n < col; n++) {
                            doc.circle(startX + n * distanceX, startY + m * distanceY, radius, 'FD');
                        }
                    }
                }
            }
        } else if (form == 40) {
            radius = 4.897 / 2;
            distanceX = 139.801 - 133.541;
            distanceY = 134.389 - 127.085;
            for (var i = 0; i < 6; i++) {
                var row = 10;
                var col = 4;
                if (i == 0) {
                    col = 6;
                    startX = 49.997;
                    startY = h - 192.847;
                }
                else if (i == 1) {
                    col = 3;
                    startX = 95.044;
                    startY = h - 193.004;
                }
                else if (i == 2) {
                    startX = 133.589;
                    startY = h - 193.004;
                }
                else if (i == 3) {
                    startX = 56.436;
                    startY = h - 112.375;
                }
                else if (i == 4) {
                    startX = 95.048;
                    startY = h - 112.375
                }
                else if (i == 5) {
                    startX = 133.589;
                    startY = h - 112.375;
                }
                else if (i == 6) {
                    startX = 113.474;
                    startY = h - 104.185;
                }
                else if (i == 7) {
                    startX = 147.785;
                    startY = h - 104.185;
                }
                for (var m = 0; m < row; m++) {
                    if (10 * i + m < sentence + 20) {
                        for (var n = 0; n < col; n++) {
                            doc.circle(startX + n * distanceX, startY + m * distanceY, radius, 'FD');
                        }
                    }
                }
            }
        } else if (form == 60) {
            radius = 4.364 / 2;
            distanceX = 119.054 - 113.474;
            distanceY = 176.412 - 169.859;
            for (var i = 0; i < 8; i++) {
                var row = 10;
                var col = 4;
                if (i == 0) {
                    col = 6;
                    startX = 39.073;
                    startY = h - 176.112;
                }
                else if (i == 1) {
                    col = 3;
                    startX = 78.908;
                    startY = h - 176.112;
                }
                else if (i == 2) {
                    startX = 113.474;
                    startY = h - 176.112;
                }
                else if (i == 3) {
                    startX = 147.785;
                    startY = h - 176.112;
                }
                else if (i == 4) {
                    startX = 45.091;
                    startY = h - 104.185;
                }
                else if (i == 5) {
                    startX = 79.164;
                    startY = h - 104.185;
                }
                else if (i == 6) {
                    startX = 113.474;
                    startY = h - 104.185;
                }
                else if (i == 7) {
                    startX = 147.785;
                    startY = h - 104.185;
                }
                for (var m = 0; m < row; m++) {
                    if (10 * i + m < sentence + 20) {
                        for (var n = 0; n < col; n++) {
                            doc.circle(startX + n * distanceX, startY + m * distanceY, radius, 'FD');
                        }
                    }
                }
            }
        } else if (form == 100) {
            radius = 3.809 / 2;
            distanceX = 116.777 - 111.907;
            distanceY = 221.399 - 215.738;
            for (var i = 0; i < 12; i++) {
                var row = 10;
                var col = 4;
                if (i == 0) {
                    col = 6;
                    startX = 47.577;
                    startY = h - 221.318;
                }
                else if (i == 1) {
                    col = 3;
                    startX = 82.401;
                    startY = h - 221.318;
                }
                else if (i == 2) {
                    startX = 111.956;
                    startY = h - 221.318;
                }
                else if (i == 3) {
                    startX = 141.879;
                    startY = h - 221.318;
                }
                else if (i == 4) {
                    startX = 52.705;
                    startY = h - 158.919;
                }
                else if (i == 5) {
                    startX = 82.45;
                    startY = h - 158.919;
                }
                else if (i == 6) {
                    startX = 111.956;
                    startY = h - 158.919;
                }
                else if (i == 7) {
                    startX = 141.879;
                    startY = h - 158.919;
                }
                else if (i == 8) {
                    startX = 52.705;
                    startY = h - 96.5;
                }
                else if (i == 9) {
                    startX = 82.45;
                    startY = h - 96.5;
                }
                else if (i == 10) {
                    startX = 111.956;
                    startY = h - 96.5;
                }
                else if (i == 11) {
                    startX = 141.879;
                    startY = h - 96.5;

                }
                for (var m = 0; m < row; m++) {
                    if (10 * i + m < sentence + 20) {
                        for (var n = 0; n < col; n++) {
                            doc.circle(startX + n * distanceX, startY + m * distanceY, radius, 'FD');
                        }
                    }
                }

            }
        }
    }
}