$(function(){
    // index
    // $('#reset_btn').on('click', function(){
    //     clearForm(this.form);
    //   });

    // function clearForm (form) {
    //     $(form)
    //         .find("input, select, textarea")
    //         .not(":button, :submit, :reset, :hidden")
    //         .val("")
    //         .prop("checked", false)
    //         .prop("selected", false)
    //     ;

    //     $(form).find(":radio").filter("[data-default]").prop("checked", true);
    // }

    $('#delete_btn').click(function(){
        if(!confirm('本当に削除しますか？')){
            /* キャンセルの時の処理 */
            return false;
        }else{
            /*　OKの時の処理 */
            $('#delete_id').submit;
        }
    });

    $('#all_check').on('click', function() {
        $("input[name='delete[]']").prop('checked', this.checked);
    });
    $("input[name='delete[]']").on('click', function() {
        if ($('.delete :checked').length == $('.delete :input').length) {
          // 全てのチェックボックスにチェックが入っていたら、「全選択」 = checked
          $('#all_check').prop('checked', true);
        } else {
          // 1つでもチェックが入っていたら、「全選択」 = checked
          $('#all_check').prop('checked', false);
        }
      });

    // personal
    $('#delete_this_btn').click(function(){
        if(!confirm('本当に削除しますか？')){
            /* キャンセルの時の処理 */
            return false;
        }else{
            /*　OKの時の処理 */
            $('#delete_this_id').submit;
        }
    });
});
