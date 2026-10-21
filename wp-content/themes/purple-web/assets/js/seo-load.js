document.addEventListener('DOMContentLoaded', function () {

    const container = document.querySelector('#seo-lazy-content');

    if (!container) return;


    const pageId = container.dataset.pageId;


    fetch(seo_ajax.ajax_url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'action=load_seo_blocks&page_id=' + pageId
    })
        .then(response => response.text())
        .then(html => {

            container.innerHTML = html;

        });

});