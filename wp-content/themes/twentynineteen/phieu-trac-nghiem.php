<?php
/*
Template Name: Phieu Trac Nghiem
*/

?>
<!doctype html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/tracnghiem.css">
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
</head>

<body>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/tnmaker">Trang chủ</a>
		
	</nav>
    <div id="page" class="site">
        <div id="content" class="site-content">
            <section id="primary" class="content-area">
                <main id="main" class="site-main">

                    <section class="make-form-tn">
                        <header class="page-header">
                            <h2 style="text-align : center">Phiếu trắc nghiệm</h2>
                        </header><!-- .page-header -->
                        <div class="row" style="padding : 20px;width : 100%;">
                            <div style="width : 30% ;text-align : center;">
                                <div style="text-align : left; padding : 20px;">
                                    <form onsubmit="return onSubmitForm(event)">
                                        <div class="form-group">
                                            <label>Chọn mẫu đề trắc nghiệm</label>
                                            <select class="form-control" id="type_form" onchange="onChangeTypeForm()">
                                                <option value="20">FORM20_VI_6SBD_NOLABEL</option>
                                                <option value="40">FORM40_VI_6SBD_NOLABEL</option>
                                                <option value="60">FORM60_VI_6SBD_NOLABEL</option>
                                                <option value="100">FORM100_VI_6SBD_NOLABEL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng câu trắc nghiệm</label>
                                            <input type="number" required min="1" max="20" class="form-control" value="20" placeholder="Điền số câu hỏi" id="number_question" onchange="change_number_questtion()">
                                        </div>
                                        <div class="form-group">
                                            <label for="customRange1">Độ đậm phiếu tô (<span id="input_preview_alpha" style="color: rgb(0, 0, 0,0.5);">50%</span>)</label>
                                            <div class="row">
                                                <div class="col-md-1" style="font-size : 18px">1</div>
                                                <div class="col-md-10">
                                                    <input id="input_alpha" type="range" class="custom-range" min='1' value="50" max="100" onchange="change_alpha()">
                                                </div>
                                                <div class="col-md-1" style="font-size : 18px">100</div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="detail_input">
                                            <label style="display : block;">Chỉnh sửa chi tiết</label>
											<label style="font-size : 0.7em;">Hiển thị</label>
											<input type="checkbox" checked data-toggle="toggle" data-size="xs" data-on="Bật" data-off="Tắt" id="input_show">
                                            <div class="row" style="font-size : 0.7em;">
                                                <div class="col-md-4 col-xs-12">
                                                    <label>Kích thước</label>
                                                    <input type="number" style="font-size : 18px" required value="10" id="input_size" min="5" max="20" class="form-control" onchange="change_size()">
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <label>Kiểu</label>
                                                    <div style="width : 100%;" class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" id="input_bold" onclick="change_bold()" class="btn btn-outline-primary" style="font-weight : bold;font-size : 18px;">Đậm</button>
                                                        <button type="button" id="input_italic" onclick="change_italic()" class="btn btn-outline-secondary" style="font-style: italic;font-size : 18px;">Nghiêng</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <label style="font-size : 0.7em;">Nội dung</label>
											
                                            <textarea disabled class="form-control" id="input_content" style="min-height: 200px; background-color : transparent; color : black;"></textarea>
                                        </div>
                                        <div class="row">
											<button type="submit" style="font-size : 18px" class="btn btn-success col-md-12 col-xs-12"><i class="fas fa-download"></i>Tải phiếu chấm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div style="text-align : center; width:70%;">
                                <!-- <button type="button" class="btn btn-primary btn-sm" onClick="add_input()" type="submit" style="float : right;">Thêm</button> -->
                                <div id="preview_html" class="page-a4" style="background-size:contain  ;background-image: url('<?php bloginfo('template_directory'); ?>/img/form20_vi_6sbd_nolabel.jpg')">
                                    <div class='resize-container' id='resize-container'>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea onClick="edit(0)" row="2" id='input0' class="text-area-noborder" style="margin-top : 19mm;margin-left : 40mm;font-size: 12px;font-weight: bold;"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea onClick="edit(1)" row="2" id='input1' class="text-area-noborder" style="margin-top : 19mm;font-size:12px; font-weight: bold;"></textarea>
                                            </div>
                                        </div>
                                        <div class="row" style="height: 8mm !important;">
                                            <div class="col-md-7">
                                                <textarea onClick="edit(2)" row="1" id='input2' class="text-area-noborder" style="margin-top : 0mm;margin-left : 50mm;font-size: 12px; font-weight: bold;"></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <textarea onClick="edit(3)" row="1" id='input3' class="text-area-noborder" style="margin-top : 0mm;font-size:12px;font-weight: bold;"></textarea>
                                            </div>
                                        </div>
                                        <div class="row" style="height: 8mm !important;">
                                            <div class="col-md-7">
                                                <textarea onClick="edit(4)" row="1" id='input4' class="text-area-noborder" style="margin-top : 0mm;margin-left : 50mm;font-size: 12px;font-weight: bold;"></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <textarea onClick="edit(5)" row="1" id='input5' class="text-area-noborder" style="margin-top : 0mm;font-size:12px;font-weight: bold;"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <textarea onClick="edit(6)" row="6" class="text-area-border" id='input6' style="margin-top : 0mm;margin-left : 40mm;font-size: 10px;max-width:80mm;min-height: 100px"></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <textarea onClick="edit(7)" row="1" id='input7' class="text-area-noborder" style="margin-top : 0mm;margin-left:20mm;font-size:12px;font-weight: bold; width : 30mm;height : 6mm;"></textarea>
                                                <textarea onClick="edit(8)" row="2" id='input8' class="text-area-border" disabled style="margin-top : 0mm;margin-left:15mm;font-size:12px;font-weight: bold;width : 25mm; height : 18mm;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var config, current;
                                init()


                                function init() {
                                    document.getElementById("input0").value = "      SỞ GD-ĐT .....................\n TRƯỜNG THPT ..........................."
                                    document.getElementById("input1").value = " PHIẾU TRẢ LỜI TRẮC NGHIỆM"
                                    document.getElementById("input2").value = "      KIỂM TRA MÔN ............................."
                                    document.getElementById("input3").value = " THỜI GIAN...................."
                                    document.getElementById("input4").value = "      HỌ VÀ TÊN ......................................."
                                    document.getElementById("input5").value = " LỚP...................."

                                    document.getElementById("input6").value = "Lưu ý:\n-Ghi đầy đủ các mục, giữ phiếu phẳng\n-Bôi đen đáp án tương ứng với số câu trong đề\n- Bài kiểm tra được chấm bằng máy, học sinh tô\n đậm, vừa khít với ô tròn giới hạn. TUYỆT ĐỐI\n không sửa chữa đáp án."
                                    document.getElementById("input7").value = " ĐIỂM SỐ"
                                    document.getElementById("input8").value = ""
									document.getElementById("detail_input").style.display = 'none'

                                    var style = []
                                    for (let i = 0; i < 9; i++) {
                                        style.push({
                                            id: "input" + i,
                                            content: document.getElementById("input" + i).value,
                                            size: 12,
                                            bold: true,
                                            italic: false,
											show : true,
                                            x: 10,
                                            y: 10,
                                            w: 10,
                                            h: 10,
                                        })
                                    }
                                    style[6].bold = false
                                    style[6].size = 10
                                    config = {
                                        form: 1,
                                        number_of_question: 20,
                                        alpha: 128,
                                        style: style,
                                    }
                                }


                                function edit(type) {
                                    current = type
									document.getElementById("detail_input").style.display = ''
                                    document.getElementById("input_content").value = document.getElementById("input" + type).value
                                    config.style[type].content = document.getElementById("input" + type).value
                                    document.getElementById("input_content").style.fontSize = config.style[type].size + "px"
                                    document.getElementById("input_size").value = config.style[type].size
									$("#input_show").prop('checked', config.style[type].show).change()
                                    if (config.style[type].bold) {
                                        document.getElementById("input_bold").classList.add("active");
                                        document.getElementById("input_content").style.fontWeight = 'bold';
                                    } else {
                                        document.getElementById("input_bold").classList.remove("active")
                                        document.getElementById("input_content").style.fontWeight = ''
                                    }

                                    if (config.style[type].italic) {
                                        document.getElementById("input_italic").classList.add("active")
                                        document.getElementById("input_content").style.fontStyle = 'italic'
                                    } else {
                                        document.getElementById("input_italic").classList.remove("active")
                                        document.getElementById("input_content").style.fontStyle = ''
                                    }
                                }

                                function change_alpha() {
                                    let tmp = document.getElementById("input_alpha").value
                                    config.alpha = Math.ceil(255 * tmp / 100)
                                    document.getElementById("input_preview_alpha").style = "color: rgb(0, 0, 0," + tmp / 100 + ");"
                                    document.getElementById("input_preview_alpha").textContent = tmp + "%"
                                }

                                function onChangeTypeForm() {
                                    let tmp = document.getElementById("type_form").value
                                    let number_ques = document.getElementById("number_question")
                                    number_ques.value = tmp
                                    if (tmp == 20) {
                                        number_ques.setAttribute("min", 1)
                                        number_ques.setAttribute("max", 20)
                                        config.number_of_question = 20
                                        config.form = 20
										document.getElementById("input6").style.display =''
                                        document.getElementById("preview_html").style = "background-size:contain  ;background-image: url('<?php bloginfo('template_directory'); ?>/img/form20_vi_6sbd_nolabel.jpg')"
                                    }

                                    if (tmp == 40) {
                                        number_ques.setAttribute("min", 21)
                                        number_ques.setAttribute("max", 40)
                                        config.number_of_question = 40
                                        config.form = 40
										document.getElementById("input6").style.display =''
                                        document.getElementById("preview_html").style = "background-size:contain  ;background-image: url('<?php bloginfo('template_directory'); ?>/img/form40_vi_6sbd_nolabel.jpg')"
                                    }

                                    if (tmp == 60) {
                                        number_ques.setAttribute("min", 41)
                                        number_ques.setAttribute("max", 60)
                                        config.number_of_question = 60
                                        config.form = 60
										document.getElementById("input6").style.display =''
                                        document.getElementById("preview_html").style = "background-size:contain  ;background-image: url('<?php bloginfo('template_directory'); ?>/img/form60_vi_6sbd_nolabel.jpg')"
                                    }

                                    if (tmp == 100) {
                                        number_ques.setAttribute("min", 61)
                                        number_ques.setAttribute("max", 100)
                                        config.number_of_question = 100
                                        config.form = 100
										document.getElementById("input6").style.display ='none'
                                        document.getElementById("preview_html").style = "background-size:contain  ;background-image: url('<?php bloginfo('template_directory'); ?>/img/form100_vi_6sbd_nolabel.jpg')"
                                    }
                                }

                                function change_bold() {
                                    document.getElementById("input_bold").classList.toggle("active")
                                    if (document.getElementById("input_bold").classList.contains("active")) {
                                        document.getElementById("input" + current).style.fontWeight = 'bold'
                                        document.getElementById("input_content").style.fontWeight = 'bold'
                                        config.style[current].bold = true
                                    } else {
                                        document.getElementById("input" + current).style.fontWeight = ''
                                        document.getElementById("input_content").style.fontWeight = ''
                                        config.style[current].bold = false
                                    }
                                }

                                function change_italic() {
                                    document.getElementById("input_italic").classList.toggle("active")
                                    if (document.getElementById("input_italic").classList.contains("active")) {
                                        document.getElementById("input" + current).style.fontStyle = 'italic'
                                        document.getElementById("input_content").style.fontStyle = 'italic'
                                        config.style[current].italic = true
                                    } else {
                                        document.getElementById("input" + current).style.fontStyle = ''
                                        document.getElementById("input_content").style.fontStyle = ''
                                        config.style[current].italic = false
                                    }
                                }
								
								$("#input_show").change(function(){
									let tmp = !config.style[current].show
									config.style[current].show = tmp
								})

                                function change_size() {
                                    document.getElementById("input" + current).style.fontSize = document.getElementById("input_size").value + "px"
                                    document.getElementById("input_content").style.fontSize = document.getElementById("input_size").value + "px"
                                    config.style[current].size = document.getElementById("input_size").value
                                }

                                function change_number_questtion() {
                                    config.number_of_question = document.getElementById("number_question").value
                                }
								
                                function onSubmitForm(e) {
									e.preventDefault()
									console.log(config)
								}
                            </script>
                        </div><!-- .page-content -->
                    </section><!-- .no-results -->


                </main><!-- #main -->
            </section><!-- #primary -->

        </div>

    </div>
</body>

</html>