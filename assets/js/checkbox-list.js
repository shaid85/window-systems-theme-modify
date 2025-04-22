(function(){
    tinymce.create('tinymce.plugins.checkbox_list', {
        init: function(editor, url) {
            console.log('[Checkbox Plugin] init() called');
            editor.addButton('checkbox_list', {
                text: '✔ Add Check Point',
                tooltip: 'Insert checkbox list',
                onclick: function() {
                    const items = prompt('Comma‑separated items');
                    if (!items) return;
                    const icon = url + '../../icons/CheckCircle filled.svg';
                    const html = `<div class="checkbox-list-container" style="display:flex; flex-direction: column; gap: 8px;">` +
                        items.split(',').map(i => `
                            <div class="checkbox-box" style="display:flex; gap: 8px;">
                                <img src="${icon}" class="checkbox-icon" alt="✔"  width="24px" style="width: 24px;">
                                <p style="margin: 0;">${i.trim()}</p>
                            </div>`).join('') +
                        `</div>`;
                    editor.insertContent(html);
                    console.log('[Checkbox Plugin] Content inserted');
                }
            });
        }
    });
    tinymce.PluginManager.add('checkbox_list', tinymce.plugins.checkbox_list);
})();
