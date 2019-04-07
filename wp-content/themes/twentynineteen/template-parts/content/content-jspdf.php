<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<section class="make-form-tn">
    <header class="page-header">
        <h1 class="page-title">JS Pdf</h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <form>
                    <div class="form-group">
                        <label>Chọn mẫu đề trắc nghiệm</label>
                        <select class="form-control" id="type_form" onchange="onChangeTypeForm()">
                            <option value="20">FORM20_VI_6SBD_NOLABEL</option>
                            <option value="40">FORM40_VI_6SBD_NOLABEL</option>
                            <option value="60">FORM60_VI_6SBD_NOLABEL</option>
                            <option value="100">FORM100_VI_6SBD_NOLABEL</option>
                            <option value="120">FORM120_VI_6SBD_NOLABEL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số lượng câu trắc nghiệm</label>
                        <input type="number" min="1" max="120" class="form-control" placeholder="Điền số câu hỏi" id="number_question">
                    </div>
                    <div class="form-group">
                        <label for="customRange1">Độ đậm phiếu tô (<span id="input_preview_alpha" style="color: rgb(0, 0, 0,0.5);">50%</span>)</label>
                        <div class="row">
                            <div class="col-md-1">1</div>
                            <div class="col-md-10">
                                <input id="input_alpha" type="range" class="custom-range" min='1' value="50" max="100" onchange="change_alpha()">
                            </div>
                            <div class="col-md-1">100</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Chỉnh sửa chi tiết</label>
                        <div class="row" style="font-size : 0.7em;">
                            <div class="col-md-4 col-xs-12">
                                <label>Kích thước</label>
                                <input type="number" value="10" id="input_size" min="5" max="20" class="form-control">
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <label>Kiểu</label>
                                <div style="width : 100%;" class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="input_bold" class="btn btn-outline-primary" style="font-weight : bold;">Đậm</button>
                                    <button type="button" id="input_italic" class="btn btn-outline-secondary" style="font-style: italic;">Nghiêng</button>
                                </div>
                            </div>
                        </div>
                        <label style="font-size : 0.7em;">Nội dung</label>
                        <textarea disabled class="form-control" id="input_content"></textarea>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-outline-primary col-md-6 col-xs-12"><i class="fas fa-clipboard-check"></i>Xem trước</button>
                        <button type="button" class="btn btn-success col-md-6 col-xs-12"><i class="fas fa-download"></i>Tải phiếu chấm</button>
                    </div>
                </form>

            </div>
            <div class="col-md-9 col-xs-12" style="text-align : center;">
                <!-- <button type="button" class="btn btn-primary btn-sm" onClick="add_input()" type="submit" style="float : right;">Thêm</button> -->
                <div id="preview_html" class="page" style="background-size:contain  ;background-image: url('http://localhost/tnmaker/wp-content/themes/twentynineteen/img/form_bai_thi.jpg')">
                    <div class='resize-container' id='resize-container'>
                        <div class="row">
                            <div class="col-md-6">
                                <textarea onClick="edit(1)" row="2" id='input1' class="text-area-noborder" style="margin-top : 19mm;margin-left : 40mm;font-size: 3.5mm;font-weight: bold;"></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea onClick="edit(2)" row="2" id='input2' class="text-area-noborder" style="margin-top : 19mm;font-size:4mm; font-weight: bold;"></textarea>
                            </div>
                        </div>
                        <div class="row" style="height: 8mm !important;">
                            <div class="col-md-7">
                                <textarea onClick="edit(3)" row="1" id='input3' class="text-area-noborder" style="margin-top : 0mm;margin-left : 50mm;font-size: 4mm; font-weight: bold;"></textarea>
                            </div>
                            <div class="col-md-5">
                                <textarea onClick="edit(4)" row="1" id='input4' class="text-area-noborder" style="margin-top : 0mm;font-size:4mm;font-weight: bold;"></textarea>
                            </div>
                        </div>
                        <div class="row" style="height: 8mm !important;">
                            <div class="col-md-7">
                                <textarea onClick="edit(5)" row="1" id='input5' class="text-area-noborder" style="margin-top : 0mm;margin-left : 50mm;font-size: 4mm;font-weight: bold;"></textarea>
                            </div>
                            <div class="col-md-5">
                                <textarea onClick="edit(6)" row="1" id='input6' class="text-area-noborder" style="margin-top : 0mm;font-size:4mm;font-weight: bold;"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <textarea onClick="edit(7)" row="6" class="text-area-border" id='input7' style="margin-top : 0mm;margin-left : 40mm;font-size: 3mm;max-width:80mm;min-height: 100px"></textarea>
                            </div>
                            <div class="col-md-5">
                                <textarea onClick="edit(8)" row="1" id='input8' class="text-area-noborder" style="margin-top : 0mm;margin-left:20mm;font-size:4mm;font-weight: bold; width : 30mm;"></textarea>
                                <textarea onClick="edit(9)" row="1" id='input9' class="text-area-border" style="margin-top : 0mm;margin-left:15mm;font-size:4mm;font-weight: bold;width : 30mm;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var config, current;
            init()


            function init() {
                document.getElementById("input1").value = "      SỞ GD-ĐT .....................\n TRƯỜNG THPT ..........................."
                document.getElementById("input2").value = " PHIẾU TRẢ LỜI TRẮC NGHIỆM"
                document.getElementById("input3").value = "      KIỂM TRA MÔN ............................."
                document.getElementById("input4").value = " THỜI GIAN...................."
                document.getElementById("input5").value = "      HỌ VÀ TÊN ......................................."
                document.getElementById("input6").value = " LỚP...................."

                document.getElementById("input7").value = "Lưu ý:\n-Ghi đầy đủ các mục, giữ phiếu phẳng\n-Bôi đen đáp án tương ứng với số câu trong đề\n- Bài kiểm tra được chấm bằng máy, học sinh tô\n đậm, vừa khít với ô tròn giới hạn. TUYỆT ĐỐI\n không sửa chữa đáp án."
                document.getElementById("input8").value = " ĐIỂM SỐ"
                document.getElementById("input9").value = ""

                var style = []
                for (let i = 0; i < 10; i++) {
                    style.push({
                        content: "",
                        size: 10,
                        bold: false,
                        italic: false,
                        x: 10,
                        y: 10,
                        w: 10,
                        h: 10,
                    })
                }
                config = {
                    form: 1,
                    number_of_question: 10,
                    alpha: 128,
                    style: style,
                }
            }

            function edit(type) {
                console.log(type)
                current = type
                document.getElementById("input_content").value = document.getElementById("input" + type).value

            }

            function change_alpha() {
                let tmp = document.getElementById("input_alpha").value
                console.log(tmp)
                config.alpha = Math.ceil(255 * tmp / 100)
                console.log(config.alpha)
                document.getElementById("input_preview_alpha").style = "color: rgb(0, 0, 0,"+tmp/100+");"
                document.getElementById("input_preview_alpha").textContent = tmp+"%"
            }

            function onChangeTypeForm(){
                let tmp = document.getElementById("type_form").value
                let number_ques = document.getElementById("number_question")
                number_ques.value = tmp
                if (tmp == 20){
                    number_ques.setAttribute("min",1)
                    number_ques.setAttribute("max",20)
                }

                if (tmp == 40){
                    number_ques.setAttribute("min",21)
                    number_ques.setAttribute("max",40)
                }

                if (tmp == 60){
                    number_ques.setAttribute("min",41)
                    number_ques.setAttribute("max",60)
                }

                if (tmp == 100){
                    number_ques.setAttribute("min",61)
                    number_ques.setAttribute("max",100)
                }

                if (tmp == 120){
                    number_ques.setAttribute("min",101)
                    number_ques.setAttribute("max",120)
                }
            }
        </script>
    </div><!-- .page-content -->
</section><!-- .no-results -->