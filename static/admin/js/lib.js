
/**
 * easyui showMessage方法
 * @param {type} msg
 * @returns {undefined}
 */
function showMessage(msg) {
    $.messager.show({
        title: "提示信息",
        msg: msg,
        timeout: 2000,
        showType: 'show',
        style: {
            right: 0,
            left: '',
            top: parent.document.body.scrollTop + parent.document.documentElement.scrollTop,
            bottom: ''
        }
    });
}