<?php
/*
Template Name: Mau Phieu
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
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/tracnghiem.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>

</head>

<body>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fonts/UVNAnhHai_R-normal.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/drawpdf/drawPDF.js"></script>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a>

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
                                                <option value="20">Phiếu chấm 20</option>
                                                <option value="40">Phiếu chấm 40</option>
                                                <option value="60">Phiếu chấm 60</option>
                                                <option value="100">Phiếu chấm 100</option>
                                                <option value="120">Phiếu chấm 120</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <button type="submit" style="font-size : 18px" class="btn btn-success col-md-12 col-xs-12"><i class="fas fa-download"></i>Tải phiếu chấm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div style="text-align : center; width:70%;">
                                <!-- <button type="button" class="btn btn-primary btn-sm" onClick="add_input()" type="submit" style="float : right;">Thêm</button> -->
                                <div id="preview_html" class="page-a4" style="background-size:contain ;">
                                    <div class='resize-container' id='resize-container'>
                                        <iframe id="preview_pdf" src="<?php bloginfo('template_directory'); ?>/drawpdf/form20_vi_6sbd_nolabel.pdf" style="width : 100%; min-height : 320mm;"></iframe>
                                    </div>
                                </div>
                            </div>

                            <script>
                                var current = 20
                                function onChangeTypeForm() {
                                    current = document.getElementById("type_form").value
                                    if (current == 20) {
                                        document.getElementById('preview_pdf').src = "<?php bloginfo('template_directory'); ?>/drawpdf/form20_vi_6sbd_nolabel.pdf"
                                    }
                                    if (current == 40) {
                                        document.getElementById('preview_pdf').src = "<?php bloginfo('template_directory'); ?>/drawpdf/form40_vi_6sbd_nolabel.pdf"
                                    }
                                    if (current == 60) {
                                        document.getElementById('preview_pdf').src = "<?php bloginfo('template_directory'); ?>/drawpdf/form60_vi_6sbd_nolabel.pdf"
                                    }
                                    if (current == 100) {
                                        document.getElementById('preview_pdf').src = "<?php bloginfo('template_directory'); ?>/drawpdf/form100_vi_6sbd_nolabel.pdf"
                                    }
                                    if (current == 120) {
                                        document.getElementById('preview_pdf').src = "<?php bloginfo('template_directory'); ?>/drawpdf/form120_vi_bgd_nolabel.pdf"
                                    }
                                }


                                function onSubmitForm(e) {
                                    e.preventDefault()
                                    var element = document.createElement('a');

                                    if (current == 20) {
                                        
                                    element.setAttribute('href', "<?php bloginfo('template_directory'); ?>/drawpdf/form20_vi_6sbd_nolabel.pdf");
                                    element.setAttribute('download', "Phieu-20.pdf");
                                    }
                                    if (current == 40) {
                                        element.setAttribute('href', "<?php bloginfo('template_directory'); ?>/drawpdf/form40_vi_6sbd_nolabel.pdf")
                                        element.setAttribute('download', "Phieu-40.pdf");
                                    }
                                    if (current == 60) {
                                        element.setAttribute('href', "<?php bloginfo('template_directory'); ?>/drawpdf/form60_vi_6sbd_nolabel.pdf")
                                        element.setAttribute('download', "Phieu-60.pdf");
                                    }
                                    if (current == 100) {
                                        element.setAttribute('href', "<?php bloginfo('template_directory'); ?>/drawpdf/form100_vi_6sbd_nolabel.pdf")
                                        element.setAttribute('download', "Phieu-100.pdf");
                                    }
                                    if (current == 120) {
                                        element.setAttribute('href', "<?php bloginfo('template_directory'); ?>/drawpdf/form120_vi_bgd_nolabel.pdf")
                                        element.setAttribute('download', "Phieu-120.pdf");
                                    }

                                    element.style.display = 'none';
                                    document.body.appendChild(element);

                                    element.click();

                                    document.body.removeChild(element);
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