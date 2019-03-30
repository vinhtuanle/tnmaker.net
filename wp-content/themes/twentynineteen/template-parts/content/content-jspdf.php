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
                <button type="button" class="btn btn-primary btn-sm" onClick="add_input()" type="submit" style="float : right;">Thêm</button>
                <div class="page">
                    <div class='resize-container' id='resize-container'>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var list = []
            var max = 0

            function submit_form() {
                console.log("Click")

            }

            function add_input() {
                var container = document.getElementById("resize-container")

                var input = document.createElement("textarea")
                input.style.height = "100%"
                input.id = "input" + list.length
                var close = document.createElement("button")
                close.style = "height : 5px;margin-right: 15px;width: 5px;"
                close.className = "close"
                close.insertAdjacentHTML('beforeend', '<span aria-hidden="true">&times;</span>')

                var tmp = document.createElement("div")
                tmp.className = "resize-drag"
                tmp.appendChild(close)
                tmp.appendChild(input)
                console.log(tmp.offsetTop)
                tmp.setAttribute('data-x', 0 - tmp.offsetTop);
                tmp.setAttribute('data-y', tmp.offsetLeft);
                list.push({
                    id: 'input' + max,
                    content: '',
                    style: {

                    },
                    position: {
                        x: '',
                        y: '',
                    }
                })
                max += 1
                container.appendChild(tmp)
                close.onclick = function() {
                    tmp.remove()
                    for (let i = 0; i < list.length; i++) {
                        if (list[i].id === input.id) {
                            list.splice(i, 1)
                            break
                        }
                    }
                }
                tmp.onclick = function() {
                    let content = $(input).val()
                    $('#preview').val(content)
                    let x = tmp.getAttribute('tn-x')
                    let y = tmp.getAttribute('tn-y')
                    list.map((item, i) => {
                        if (item.id === input.id) {
                            item.content = content
                            item.position = {
                                x: tmp.getAttribute('tn-x'),
                                y: tmp.getAttribute('tn-y')
                            }
                        }
                    })
                    console.log(list)
                }
                let tn_x = tmp.offsetLeft
                let tn_y = tmp.offsetTop
                tmp.setAttribute('tn-x', tn_x)
                tmp.setAttribute('tn-y', tn_y)
                interact(tmp).draggable({
                        onmove: function(event) {

                            var target = event.target;

                            var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                            var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
                            // translate the element
                            target.style.webkitTransform = target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';

                            // update the posiion attributes
                            target.setAttribute('data-x', x);
                            target.setAttribute('data-y', y);
                            target.setAttribute('tn-x', tn_x + x);
                            target.setAttribute('tn-y', tn_y + y);
                        },
                        modifiers: [
                            interact.modifiers.restrict({
                                restriction: 'parent',
                                elementRect: {
                                    top: 0,
                                    left: 0,
                                    bottom: 1,
                                    right: 1
                                }
                            })
                        ]
                    }).resizable({
                        // resize from all edges and corners
                        edges: {
                            left: true,
                            right: true,
                            bottom: true,
                            top: true
                        },

                        modifiers: [
                            // keep the edges inside the parent
                            interact.modifiers.restrictEdges({
                                outer: 'parent',
                                endOnly: true,
                            }),

                            // minimum size
                            // interact.modifiers.restrictSize({
                            //     min: {
                            //         width: 100,
                            //         height: 50
                            //     },
                            // }),
                        ],

                        inertia: true
                    })
                    .on('resizemove', function(event) {
                        var target = event.target,
                            x = (parseFloat(target.getAttribute('data-x')) || 0),
                            y = (parseFloat(target.getAttribute('data-y')) || 0);

                        // update the element's style
                        target.style.width = event.rect.width + 'px';
                        target.style.height = event.rect.height + 'px';

                        // translate when resizing from top or left edges
                        x += event.deltaRect.left;
                        y += event.deltaRect.top;

                        target.style.webkitTransform = target.style.transform =
                            'translate(' + x + 'px,' + y + 'px)';

                        target.setAttribute('data-x', x);
                        target.setAttribute('data-y', y);
                        // target.textContent = Math.round(event.rect.width) + '\u00D7' + Math.round(event.rect.height);
                    });
            }



            // interact('.resize-drag')
            //     .draggable({
            //         onmove: function(event) {

            //             var target = event.target;

            //             var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
            //             var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
            //             // translate the element
            //             target.style.webkitTransform = target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';

            //             // update the posiion attributes
            //             target.setAttribute('data-x', x);
            //             target.setAttribute('data-y', y);
            //         },
            //         modifiers: [
            //             interact.modifiers.restrict({
            //                 restriction: 'parent',
            //                 elementRect: {
            //                     top: 0,
            //                     left: 0,
            //                     bottom: 1,
            //                     right: 1
            //                 }
            //             })
            //         ]
            //     })
            //     .resizable({
            //         // resize from all edges and corners
            //         edges: {
            //             left: true,
            //             right: true,
            //             bottom: true,
            //             top: true
            //         },

            //         modifiers: [
            //             // keep the edges inside the parent
            //             interact.modifiers.restrictEdges({
            //                 outer: 'parent',
            //                 endOnly: true,
            //             }),

            //             // minimum size
            //             interact.modifiers.restrictSize({
            //                 min: {
            //                     width: 100,
            //                     height: 50
            //                 },
            //             }),
            //         ],

            //         inertia: true
            //     })
            //     .on('resizemove', function(event) {
            //         var target = event.target,
            //             x = (parseFloat(target.getAttribute('data-x')) || 0),
            //             y = (parseFloat(target.getAttribute('data-y')) || 0);

            //         // update the element's style
            //         target.style.width = event.rect.width + 'px';
            //         target.style.height = event.rect.height + 'px';

            //         // translate when resizing from top or left edges
            //         x += event.deltaRect.left;
            //         y += event.deltaRect.top;

            //         target.style.webkitTransform = target.style.transform =
            //             'translate(' + x + 'px,' + y + 'px)';

            //         target.setAttribute('data-x', x);
            //         target.setAttribute('data-y', y);
            //         // target.textContent = Math.round(event.rect.width) + '\u00D7' + Math.round(event.rect.height);
            //     });
        </script>
    </div><!-- .page-content -->
</section><!-- .no-results --> 