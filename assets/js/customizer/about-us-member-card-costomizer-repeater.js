jQuery(document).ready(function ($) {
  function updateMemberRepeater(control) {
    const data = [];

    control.find(".member-repeater-card").each(function () {
      data.push({
        name: $(this).find(".member-name").val(),
        position: $(this).find(".member-position").val(),
        image: $(this).find(".member-image-url").val(),
        description: $(this).find(".member-description").val(),
      });
    });

    control
      .find(".member-repeater-hidden")
      .val(JSON.stringify(data))
      .trigger("change");
  }

  $(document).on("click", ".member-repeater-add-card", function () {
    const container = $(this).siblings(".member-repeater-cards");

    const html = `
      <div class="member-repeater-card" style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <label>Name</label>
        <input type="text" class="member-name" placeholder="Name" style="width:100%; margin-bottom:8px;">

        <label>Position</label>
        <input type="text" class="member-position" placeholder="Position" style="width:100%; margin-bottom:8px;">

        <label>Image</label>
        <div class="member-image-preview" style="margin-bottom:8px;">
          <img src="" class="member-image-preview-tag" style="max-height:60px; display:none;" />
        </div>
        <input type="text" class="member-image-url" placeholder="Image URL" readonly style="width:100%; margin-bottom:5px;">
        <button type="button" class="button member-upload-image" style="margin-bottom:10px;">Upload Image</button>
        
        <div>
        <label>Description</label>
        <textarea class="member-description" placeholder="Description" style="width:100%; margin-bottom:10px;"></textarea>
      </div>
        <button type="button" class="button member-remove-card">Remove Member</button>
      </div>
    `;
    container.append(html);
    updateMemberRepeater(container.closest(".customize-control"));
  });

  $(document).on("click", ".member-remove-card", function () {
    const control = $(this).closest(".customize-control");
    $(this).closest(".member-repeater-card").remove();
    updateMemberRepeater(control);
  });

  $(document).on(
    "input",
    ".member-name, .member-position, .member-description",
    function () {
      updateMemberRepeater($(this).closest(".customize-control"));
    }
  );

  $(document).on("click", ".member-upload-image", function (e) {
    e.preventDefault();
    const button = $(this);

    const frame = wp.media({
      title: "Select Member Image",
      library: { type: ["image"] },
      button: { text: "Use this image" },
      multiple: false,
    });

    frame.on("select", function () {
      const attachment = frame.state().get("selection").first().toJSON();
      const url = attachment.url;
      const wrapper = button.closest(".member-repeater-card");
      wrapper.find(".member-image-url").val(url);
      wrapper.find(".member-image-preview-tag").attr("src", url).show();
      updateMemberRepeater(wrapper.closest(".customize-control"));
    });

    frame.open();
  });

  function loadSavedMemberRepeater(control) {
    const saved = control.find(".member-repeater-hidden").val();

    if (!saved) return;

    try {
      const data = JSON.parse(saved);

      data.forEach((item) => {
        const html = `
        <div class="member-repeater-card" style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
          <label>Name</label>
          <input type="text" class="member-name" placeholder="Name" value="${
            item.name || ""
          }" style="width:100%; margin-bottom:8px;">

          <label>Position</label>
          <input type="text" class="member-position" placeholder="Position" value="${
            item.position || ""
          }" style="width:100%; margin-bottom:8px;">

          <label>Image</label>
          <div class="member-image-preview" style="margin-bottom:8px;">
            <img src="${
              item.image || ""
            }" class="member-image-preview-tag" style="max-height:60px; ${
          item.image ? "" : "display:none;"
        }" />
          </div>
          <input type="text" class="member-image-url" placeholder="Image URL" value="${
            item.image || ""
          }" readonly style="width:100%; margin-bottom:5px;">
          <button type="button" class="button member-upload-image" style="margin-bottom:10px;">Upload Image</button>

          <label>Description</label>
          <textarea class="member-description" placeholder="Description" style="width:100%; margin-bottom:10px;">${
            item.description || ""
          }</textarea>

          <button type="button" class="button member-remove-card">Remove Member</button>
        </div>
      `;
        control.find(".member-repeater-cards").append(html);
      });
    } catch (e) {
      console.error("Failed to load saved repeater data:", e);
    }
  }

  $(".customize-control.member-card-repeater").each(function () {
    loadSavedMemberRepeater($(this));
  });
});
