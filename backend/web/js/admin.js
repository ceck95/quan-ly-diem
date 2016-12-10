String.prototype.stripViet = function () {
    var replaceChr = String.prototype.stripViet.arguments[0];
    var stripped_str = this.toLowerCase();
    var viet = [];
    i = 0;
    viet[i++] = ['a', "/á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/g"];
    viet[i++] = ['o', "/ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ổ|ỗ|ộ/g"];
    viet[i++] = ['e', "/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/g"];
    viet[i++] = ['u', "/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/g"];
    viet[i++] = ['i', "/í|ì|ỉ|ĩ|ị/g"];
    viet[i++] = ['y', "/ý|ỳ|ỷ|ỹ|ỵ/g"];
    viet[i++] = ['d', "/đ/g"];
    for (var i = 0; i < viet.length; i++) {
        stripped_str = stripped_str.replace(eval(viet[i][1]), viet[i][0]);
        //stripped_str = stripped_str.replace(eval(viet[i][1].toUpperCase().replace('G', 'g')), viet[i][0].toUpperCase());
    }
    if (replaceChr) {
        return stripped_str.replace(/[\W]|_/g, replaceChr).replace(/\s/g, replaceChr).replace(/^\-+|\-+$/g, replaceChr);
    } else {
        return stripped_str;
    }
};

jQuery(document).ready(function () {
    (new Admin()).init();
});

function Admin() {
    this.init = function () {
        //$("table.resizable").resizableColumns();
        var _body = $('body');
        _body
            .on('click', '.viewInModal', function () {
                var t = $(this);
                var url = t.attr('href');
                $.ajax({
                    url: url,
                    method: 'GET',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('viewInModal', true);
                    },
                    success: function (res) {
                        $('#commonModal').remove();
                        var modalHtml =
                            '<div style="width:1000px; margin-left:-500px;" class="modal fade" id="commonModal" tabindex="-1" role="dialog"' +
                            '<div class="modal-dialog">' +
                            '<div class="modal-content">' +
                            '<div class="modal-body">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                            res +
                            '</div>' +
                            '<div class="modal-footer">' +
                            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        _body.append(modalHtml);
                        var _modal = $('#commonModal');
                        //_modal.find('modal-body').append(res);
                        _modal.modal('show');
                    },
                    error: function() {
                        return true;
                    }
                });
                return false;

            })
            .on('hide.bs.modal', '#commonModal', function () {
                $('#commonModal').remove();
                _body.removeClass('modal-open');
                $('.modal-backdrop').remove();
            })
            .on('click', '.ddToggleDown', function () {
                var t = $(this);
                t.find('i').attr('class', 'icon-angle-up');
                $(t.attr('data-target')).removeClass('hidden');
                t.addClass('ddToggleUp').removeClass('ddToggleDown');
            })
            .on('click', '.ddToggleUp', function () {
                var t = $(this);
                t.find('i').attr('class', 'icon-angle-down');
                $(t.attr('data-target')).addClass('hidden');
                t.addClass('ddToggleDown').removeClass('ddToggleUp');
            })
        ;

        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        
    }

}