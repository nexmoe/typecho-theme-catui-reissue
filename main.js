/*
 * @Author: 折影轻梦 (https://i.chainwon.com/) 
 * @Date: 2017-12-22 22:06:53 
 * @Last Modified by: 折影轻梦 (https://i.chainwon.com/)
 * @Last Modified time: 2017-12-22 23:10:09
 */
var $$ = mdui.JQ;
new mdui.Fab('#menu-nav');
console.log('\n %c  Cat UI V2.2 情托于物。人情冷暖，世态炎凉。 %c @折影轻梦<https://i.chainwon.com/seasoncat.html> \n\n', 'color:rgb(255, 242, 242);background:rgb(244, 164, 164);padding:5px 0;border-radius:3px 0 0 3px;', 'color:rgb(244, 164, 164);background:rgb(255, 242, 242);padding:5px 0;border-radius:0 3px 3px 0;');
//other start
hljs.initHighlightingOnLoad();
InstantClick.on('change', function () {
    mdui.mutation();
    new mdui.Fab('#menu-nav');
    ga('send', 'pageview', location.pathname + location.search);
    ajaxc();
});
//other end
var MenuIsOpen = false;
$(".header-btn").click(function () {
    if (MenuIsOpen) {
        document.getElementById("header-menu").className = "header nav-hid";
        MenuIsOpen = false;
    } else {
        document.getElementById("header-menu").className = "header nav-appear";
        MenuIsOpen = true;
    }
});
Smilies = {
    dom: function (id) {
        return document.getElementById(id);
    },
    showBox: function () {
        this.dom("OwO").style.display = "block";
    },
    closeBox: function () {
        this.dom("OwO").style.display = "none";
    },
    grin: function (tag) {
        tag = ' ' + tag + ' ';
        myField = this.dom("textarea");
        document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
    },
    insertTag: function (tag) {
        myField = Smilies.dom("textarea");
        myField.selectionStart || myField.selectionStart == "0" ? (
            startPos = myField.selectionStart,
            endPos = myField.selectionEnd,
            cursorPos = startPos,
            myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length),
            cursorPos += tag.length,
            myField.focus(),
            myField.selectionStart = cursorPos,
            myField.selectionEnd = cursorPos) : (
            myField.value += tag,
            myField.focus());
    }
}

function get_sider_catui_item_fixed(id) {
    var divs = document.getElementById("sider").getElementsByTagName("section");
    for (var i = 0; i < divs.length; i++) {
        divs[i].className = "catui-item";
        document.getElementById("sider-support").className = "catui-item disappear";
        document.getElementById("sider-OwO").className = "catui-item disappear";
        document.getElementById("sider-" + id).className = "catui-item sider-fixed";
    }
}

function get_sider_catui_item_disappear(id) {
    if (id == "support" || id == "OwO") {
        setTimeout(function () {
            document.getElementById("sider-" + id).className = "catui-item disappear";
        }, 200);
    } else {
        setTimeout(function () {
            document.getElementById("sider-" + id).className = "catui-item";
        }, 200);
    }
}

function getScrollTop() {　　
    var scrollTop = 0,
        bodyScrollTop = 0,
        documentScrollTop = 0;　　
    if (document.body) {　　　　
        bodyScrollTop = document.body.scrollTop;　　
    }　　
    if (document.documentElement) {　　　　
        documentScrollTop = document.documentElement.scrollTop;　　
    }　　
    scrollTop = (bodyScrollTop - documentScrollTop > 0) ? bodyScrollTop : documentScrollTop;　　
    return scrollTop;
}

//文档的总高度

function getScrollHeight() {　　
    var scrollHeight = 0,
        bodyScrollHeight = 0,
        documentScrollHeight = 0;　　
    if (document.body) {　　　　
        bodyScrollHeight = document.body.scrollHeight;　　
    }　　
    if (document.documentElement) {　　　　
        documentScrollHeight = document.documentElement.scrollHeight;　　
    }　　
    scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;　　
    return scrollHeight;
}

//浏览器视口的高度

function getWindowHeight() {　　
    var windowHeight = 0;　　
    if (document.compatMode == "CSS1Compat") {　　　　
        windowHeight = document.documentElement.clientHeight;　　
    } else {　　　　
        windowHeight = document.body.clientHeight;　　
    }　　
    return windowHeight;
}

window.onscroll = function () {
    var ToTopHeight = getWindowHeight() * 1.5;
    if (getScrollTop() + getWindowHeight() > ToTopHeight) {
        new mdui.Fab('.mdui-fab-fixed').show();
    } else {
        new mdui.Fab('.mdui-fab-fixed').hide();
    } 
}

function get_to_top() {
    setTimeout(function () {
        new mdui.Fab('.mdui-fab-fixed').hide();
    }, 300);
    (function smoothscroll() {
        var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
        if (currentScroll > 0) {
            window.requestAnimationFrame(smoothscroll);
            window.scrollTo(0, currentScroll - (currentScroll / 5));
        }
    })();
}
// comments

function ajaxc() {
    var
        txt_1 = '请填写称呼！',
        txt_2 = '请填写Email地址，可使用QQ邮箱！',
        txt_3 = 'Email地址不存在！',
        txt_4 = '请填写评论内容！';
    $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
    var
        comments_order = 'DESC',
        comment_list = '.comment-list',
        comments = '.comment-num',
        comment_reply = '.comment-reply',
        comment_form = '#comment-form',
        respond = '#comments',
        textarea = '#textarea',
        submit_btn = '.submit',
        new_id = '',
        parent_id = '';

    click_bind();

    $(comment_form).submit(function () { // 提交

        $$("#comment-btn").prop('disabled', true);
        $$('#comment-btn').html("<div class=\"mdui-spinner\"></div>");
        mdui.mutation();

        /* 预检 */
        if ($(comment_form).find('#author')[0]) {

            if ($(comment_form).find('#author').val() == '') {
                mdui.dialog({
                    content: txt_1,
                    buttons: [{text: '确认'}]
                });
                $$("#comment-btn").prop('disabled', false);
                $$('#comment-btn').html("<i class=\"mdui-icon material-icons\">send</i>");
                mdui.mutation();
                msg_effect('#error');
                return false;
            }

            if ($(comment_form).find('#mail').val() == '') {
                mdui.dialog({
                    content: txt_2,
                    buttons: [{text: '确认'}]
                });
                $$("#comment-btn").prop('disabled', false);
                $('#comment-btn').html("<i class=\"mdui-icon material-icons\">send</i>");
                msg_effect('#error');
                return false;
            }

            var filter = /^[^@\s<&>]+@([a-z0-9]+\.)+[a-z]{2,4}$/i;
            if (!filter.test($(comment_form).find('#mail').val())) {
                mdui.dialog({
                    content: txt_3,
                    buttons: [{text: '确认'}]
                });
                $$("#comment-btn").prop('disabled', false);
                $('#comment-btn').html("<i class=\"mdui-icon material-icons\">send</i>");
                msg_effect('#error');
                return false;
            }
        }
        var textValue = $(comment_form).find(textarea).val().replace(/(^\s*)|(\s*$)/g, ""); //排除空格
        if (textValue == null || textValue == "") {
            mdui.dialog({
                content: txt_4,
                buttons: [{text: '确认'}]
            });
            $$("#comment-btn").prop('disabled', false);
            $('#comment-btn').html("<i class=\"mdui-icon material-icons\">send</i>");
            msg_effect('#error');
            console.log("内容为空");
            return false;
        }
        $(submit_btn).addClass("active");
        $('#loading').show();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serializeArray(),
            error: function () {
                mdui.dialog({
                    content: "评论失败，请重试！",
                    buttons: [{text: '确认'}]
                });
                $$("#comment-btn").prop('disabled', false);
                $('#comment-btn').html("<i class=\"mdui-icon material-icons\">send</i>");
                msg_effect('#error');
                return false;
            },
            success: function (data) { //成功取到数据
                //console.log(data);
                $('#loading').slideUp();
                try {
                    if (!$(comment_list, data).length) {
                        mdui.dialog({
                            content: "评论失败，可能输入内容中不含有中文或有敏感词汇！",
                            buttons: [{text: '确认'}]
                        });
                        $$("#comment-btn").prop('disabled', false);
                        $('#comment-btn').html("<i class=\"mdui-icon material-icons\">send</i>");
                        msg_effect('#error');
                        return false;
                    } else {
                        
                        new_id = $(comment_list, data).html().match(/id="?comment-\d+/g).join().match(/\d+/g).sort(function (a, b) {
                            return a - b
                        }).pop(); // TODO：找新 id，如果在第二页评论的话，找到的ID是有问题的！

                        if ($('.page-navigator .prev').length && parent_id == "") {
                            new_id = '';
                            var dd = $(".prev a").attr("href"); //获取上页地址
                            $(".prev a").attr("href", ""); //将地址清空
                            dd = dd.replace(/comment-page-(.*?)#comments/, "comment-page-1#comments"); //将获取的地址页码改为1
                            $(".prev a").attr("href", dd); //将地址放回去
                            $('.prev a').get(0).click(); //点击这个超链接
                        } //判断当前评论列表是否在第一页,并且只会在母评论时候才会生效

                        console.log("new id " + new_id);
                        msg_effect("#success");
                        //插入评论内容到当前页面
                        if (parent_id) {
                            data = $('#li-comment-' + new_id, data).hide(); // 取新评论
                            if ($('#' + parent_id).find(".comment-children").length <= 0) {
                                $('#' + parent_id).append("<div class='comment-children'><ol class='comment-list'></ol></div>");
                            }
                            if (new_id) //new_id不为空的时候才会插入
                                $('#' + parent_id + " .comment-children .comment-list").prepend(data);
                            console.log('该评论为子评论,parent_id:' + parent_id);
                            parent_id = '';
                            //console.log(data);
                        } else {
                            data = $('#li-comment-' + new_id, data).hide(); // 取新评论
                            //console.log('该评论为母评论');
                            if (!$(comment_list).length) //如果一条评论也没有的话
                                $(respond).append('<div class="info-com">仅有<span class="comment-num">0<\/span>条评论<\/div><ol class="comment-list"><\/ol>'); // 加 ol
                            $(comment_list).prepend(data);
                            //console.log('评论内容:');
                            //console.log(data);
                        }
                        $('#li-comment-' + new_id).fadeIn(); // 显示
                        var num;
                        $(comments).length ? (num = parseInt($(comments).text().match(/\d+/)), $(comments).html($(comments).html().replace(num, num + 1))) : 0;
                        //console.log($('#comments h4').length);
                        // 评论数加一
                        TypechoComment.cancelReply();
                        $(textarea).val('');
                        $(comment_reply + ' a, #cancel-comment-reply-link').unbind('click');
                        click_bind(); // 新评论绑定
                        $(submit_btn).attr('disabled', false).fadeTo('slow', 1);
                        if (new_id) {
                            $body.animate({
                                scrollTop: $('#li-comment-' + new_id).offset().top - 50
                            }, 500);
                        } else {
                            $body.animate({
                                scrollTop: $('#comments').offset().top - 50
                            }, 500);
                        }
                        $$("#comment-btn").prop('disabled', false);
                        $('#comment-btn').html("<i class=\"mdui-icon material-icons\">send</i>");
                    }
                } catch (e) {
                    //alert('评论ajax错误!请截图并联系主题制作者！\n\n' + e);
                    window.location.reload();
                }
            } // end success()
        }); // end ajax()
        return false;
    }); // end $(comment_form).submit()

    function click_bind() { // 绑定
        $(comment_reply + ' a').click(function () { // 回复
            //$body.animate({scrollTop: $(respond).offset().top - 180}, 400);
            //console.log($(this).parent().parent().parent().parent());
            parent_id = $(this).parent().parent().parent().parent().parent().attr("id"); //parent()数量根据模板而定，否则评论嵌套可能有问题
            console.log("parent_id:" + parent_id);
            $(textarea).focus();
        });
        $('#cancel-comment-reply-link').click(function () { // 取消
            parent_id = '';
        });
    }

    function msg_effect(id) { // 出错
        $(submit_btn).attr('disabled', false).fadeTo('', 1);
    }
}
ajaxc();