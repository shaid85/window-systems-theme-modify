wp.customize.bind('ready', function () {
  jQuery(document).ready(function ($) {

    function updateRepeater(control) {
      const data = [];

      control.find(".repeater-card").each(function () {
        data.push({
          icon: $(this).find(".card-icon").val(),
          title: $(this).find(".card-title").val(),
          description: $(this).find(".card-description").val(),
        });
      });

      control.find(".repeater-hidden").val(JSON.stringify(data)).trigger("change");
    }

    function loadSavedRepeater(control) {
      const saved = control.find(".repeater-hidden").val();
      if (!saved) return;

      try {
        const data = JSON.parse(saved);

        data.forEach((item) => {
          const html = `
            <div class="repeater-card" style="margin-bottom: 10px; padding: 10px; border: 1px solid #ccc;">
              <div class="icon-preview-wrap" style="margin-bottom: 5px;">
                <img class="icon-preview" src="${item.icon || ""}" style="max-height:40px; ${item.icon ? "" : "display:none;"}" />
              </div>
              <input type="text" class="card-icon" placeholder="SVG Image URL" value="${item.icon || ""}" style="width:100%; margin-bottom:5px;" readonly>
              <button type="button" class="button upload-svg">Upload SVG Icon</button>
              <input type="text" class="card-title" placeholder="Title" value="${item.title || ""}" style="width:100%; margin-top:5px;">
              <textarea class="card-description" placeholder="Description" style="width:100%; margin-top:5px;">${item.description || ""}</textarea>
              <button type="button" class="button remove-card" style="margin-top:5px;">Remove</button>
            </div>
          `;
          control.find(".repeater-cards").append(html);
        });
      } catch (err) {
        console.error("Error parsing saved repeater data:", err);
      }
    }

    $(".customize-control.card-icon-repeater").each(function () {
      loadSavedRepeater($(this));
    });

    // Add Card
    $(document).on("click", ".repeater-add-card", function () {
      const container = $(this).siblings(".repeater-cards");

      const html = `
        <div class="repeater-card" style="margin-bottom: 10px; padding: 10px; border: 1px solid #ccc;">
          <div class="icon-preview-wrap" style="margin-bottom: 5px;">
            <img class="icon-preview" src="" style="max-height:40px; display:none;" />
          </div>
          <input type="text" class="card-icon" placeholder="SVG Image URL" style="width:100%; margin-bottom:5px;" readonly>
          <button type="button" class="button upload-svg">Upload SVG Icon</button>
          <input type="text" class="card-title" placeholder="Title" style="width:100%; margin-top:5px;">
          <textarea class="card-description" placeholder="Description" style="width:100%; margin-top:5px;"></textarea>
          <button type="button" class="button remove-card" style="margin-top:5px;">Remove</button>
        </div>
      `;
      container.append(html);
      updateRepeater(container.closest(".customize-control"));
    });

    // Remove card
    $(document).on("click", ".remove-card", function () {
      const control = $(this).closest(".customize-control");
      $(this).closest(".repeater-card").remove();
      updateRepeater(control);
    });

    // Update on input
    $(document).on("input", ".card-title, .card-description", function () {
      updateRepeater($(this).closest(".customize-control"));
    });

    // Media uploader
    $(document).on("click", ".upload-svg", function (e) {
      e.preventDefault();

      const button = $(this);
      const frame = wp.media({
        title: "Select SVG Icon",
        library: { type: ["image/svg+xml"] },
        button: { text: "Use this SVG" },
        multiple: false,
      });

      frame.on("select", function () {
        const attachment = frame.state().get("selection").first().toJSON();
        const url = attachment.url;

        const wrapper = button.closest(".repeater-card");
        wrapper.find(".card-icon").val(url);
        wrapper.find(".icon-preview").attr("src", url).show();

        updateRepeater(wrapper.closest(".customize-control"));
      });

      frame.open();
    });

  });
});
