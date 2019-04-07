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

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title">JS Pdf</h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <form>
                    <div class="form-group">
                        <label>Số lượng câu trắc nghiệm</label>
                        <input type="number" class="form-control" placeholder="Điền số câu hỏi" id="number_question">
                    </div>
                    <div class="form-group">
                        <label>Chỉnh sửa chi tiết</label>
                        <div class="row" style="font-size : 0.7em;">
                            <div class="col-md-4">
                                <label>Kích thước</label>
                                <input type="number" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Font</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option style="font-family: cursive;">cursive</option>
                                    <option style="font-family: cursive;">fantasy</option>
                                    <option style="font-family: monospace;">monospace</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Kiểu</label>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-primary" style="font-weight : bold;">B</button>
                                    <button type="button" class="btn btn-outline-secondary" style="font-style: italic;">I</button>
                                    <button type="button" class="btn btn-outline-success" style="text-decoration: underline">U</button>
                                </div>
                            </div>
                        </div>
                        <label>Nội dung</label>
                        <textarea disabled class="form-control" id="preview"></textarea>
                    </div>

                </form>

            </div>
            <div class="col-md-8 col-xs-12" style="text-align : right;">
                <!-- <button type="button" class="btn btn-primary btn-sm" onClick="add_input()" type="submit" style="float : right;">Thêm</button> -->
                <div class="page" style="background-size:contain  ;background-image: url('http://localhost/tnmaker/wp-content/themes/twentynineteen/img/form_bai_thi.jpg')">
                    <div class='resize-container' id='resize-container'>
                        <div class="row">
                            <div class="col-md-6">
                                <textarea row="2" id='input1' class="text-area-noborder" style="margin-top : 19mm;margin-left : 40mm;font-size: 3.5mm;font-weight: bold;"></textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea row="2" id='input2' class="text-area-noborder" style="margin-top : 19mm;font-size:4mm; font-weight: bold;"></textarea>
                            </div>
                        </div>
                        <div class="row" style="height: 8mm !important;">
                            <div class="col-md-7">
                                <textarea row="1" id='input3' class="text-area-noborder" style="margin-top : 0mm;margin-left : 50mm;font-size: 4mm; font-weight: bold;"></textarea>
                            </div>
                            <div class="col-md-5">
                                <textarea row="1" id='input4' class="text-area-noborder" style="margin-top : 0mm;font-size:4mm;font-weight: bold;"></textarea>
                            </div>
                        </div>
                        <div class="row" style="height: 8mm !important;">
                            <div class="col-md-7">
                                <textarea row="1" id='input5' class="text-area-noborder" style="margin-top : 0mm;margin-left : 50mm;font-size: 4mm;font-weight: bold;"></textarea>
                            </div>
                            <div class="col-md-5">
                                <textarea row="1" id='input6' class="text-area-noborder" style="margin-top : 0mm;font-size:4mm;font-weight: bold;"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <textarea row="6" class="text-area-border" id='input7' style="margin-top : 0mm;margin-left : 40mm;font-size: 3mm;max-width:80mm;min-height: 100px"></textarea>
                            </div>
                            <div class="col-md-5">
                                <textarea row="1" id='input8' class="text-area-noborder" style="margin-top : 0mm;margin-left:20mm;font-size:4mm;font-weight: bold; width : 30mm;"></textarea>
                                <textarea row="1" id='input9' class="text-area-border" style="margin-top : 0mm;margin-left:15mm;font-size:4mm;font-weight: bold;width : 30mm;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("input1").value = "      SỞ GD-ĐT .....................\n TRƯỜNG THPT ..........................."
            document.getElementById("input2").value = " PHIẾU TRẢ LỜI TRẮC NGHIỆM"
            document.getElementById("input3").value = "      KIỂM TRA MÔN ............................."
            document.getElementById("input4").value = " THỜI GIAN...................."
            document.getElementById("input5").value = "      HỌ VÀ TÊN ......................................."
            document.getElementById("input6").value = " LỚP...................."

            document.getElementById("input7").value = "Lưu ý:\n-Ghi đầy đủ các mục, giữ phiếu phẳng\n-Bôi đen đáp án tương ứng với số câu trong đề\n- Bài kiểm tra được chấm bằng máy, học sinh tô\n đậm, vừa khít với ô tròn giới hạn. TUYỆT ĐỐI\n không sửa chữa đáp án."
            document.getElementById("input8").value = " ĐIỂM SỐ"

            document.getElementById("input9").value = ""
        </script>
    </div><!-- .page-content -->
</section><!-- .no-results -->