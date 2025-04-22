<?php

get_header();

?>

<?php

global $post;

$post_id = $post->ID;
$post_link = get_permalink($post_id);
$handsClippingIcon = file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/hands-clapping.svg");

?>

<!-- header section -->

<div class="bg-white">
  <section class="max-w-[1440px] md:p-[80px] mx-auto ">
    <header class="flex items-start gap-[24px] flex-start">

      <div class="hidden md:block w-[20px] flex-shrink-0">
        <svg width="20" height="48" viewBox="0 0 20 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
            fill="#FFCC32"></path>
        </svg>
      </div>

      <div class="flex flex-col gap-[16px] p-[16px] md:p-0 py-[40px]">
        <h1 class=" text-[#000000] text-[40px] font-[400] leading-[48px] font-Erbaum">
          <?php the_title(); ?>
        </h1>
        <div class="cpt-desc-container text-[#000000] text-[18px] leading-[26px] font-degular-var">
          <p class="cpt-desc-short">
            <?php echo wp_trim_words(get_the_content(), 40, '...'); ?>
          </p>

          <div class="hidden cpt-desc-full">
            <?php the_content(); ?>
          </div>

          <div>
            <button class="cpt-show-more mt-4 text-black text-[18px]" data-show-text="Rodyti daugiau"
              data-hide-text="Rodyti mažiau">
              Rodyti daugiau
            </button>
          </div>
        </div>

      </div>
    </header>
  </section>

</div>




<a id="goto-main" href="#calc-header"></a>
<div class="md:max-w-[1440px] p-[16px] md:px-[180px] md:py-[56px] mx-auto" id="calc-header">
  <h2 class="erbaum-regular sub-title">Skaičiuoklė</h2>
  <div class="my-[12px]">
    <p>Nurodykite pageidaujamų gaminių kiekius.</p>
  </div>



  <div class="flex my-[16px] items-center gap-4">
    <input type="range" name="form-progress" id="form-progress" class="w-[90%]" value="90" max="100" readonly
      style="background: linear-gradient(to right, #027AFF 90%, white 90%);" />
    <div class="text-center w-[10%] font-semibold text-gray-700">90%</div>
  </div>

  <div class="bg-white rounded-[16px] p-[12px] md:p-[32px]" id="calc-multistep-container-wrap">
    <?php echo do_shortcode("[calc_form post_id=$post_id]"); ?>
  </div>

  <div
    class="bg-white rounded-[16px] px-[16px] py-[24px] md:p-[120px] flex items-center justify-center flex-col gap-[24px] hidden"
    id="calc-thankyou">
    <p class="">
      <?php echo $handsClippingIcon; ?>
    </p>
    <h2 class="sub-title text-[22px]">Ačiū! Jūsų užklausą gavome!</h2>
    <p class="text-center text-[18px]"><strong>Per 48 valandas</strong> mes su Jumis susisieksime ir informuosime apie
      sąmatos sudarymą!
      Pateiktoje sąmatoje matysite gaminių bei paslaugų išdėstymą, pagal Jūsų pateiktą užklausą. Tuomet galėsite
      pasirinkti labiausiai Jūsų poreikius atitinkantį pasiūlymą.</p>

    <a href="<?php echo $post_link; ?>" class="thank-btn min-w-[220px]">
      Grįžti į pagrindinį
    </a>
  </div>


</div>

<style>
  body {
    background: #f7f7f7;
  }

  input[type="range"] {
    -webkit-appearance: none;
    width: 100%;
    height: 8px;
    /* background: linear-gradient(to right, #22c55e 90%, white 90%); */
    background: #027AFF;
    border-radius: 4px;
    overflow: hidden;
  }

  input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 0;
    height: 0;
  }

  input[type="range"]::-moz-range-thumb {
    width: 0;
    height: 0;
    border: none;
  }

  input[type="range"]::-ms-thumb {
    width: 0;
    height: 0;
    border: none;
  }

  .thank-btn {
    width: 220px;
    height: 48;
    gap: 10px;
    padding-top: 12px;
    padding-right: 16px;
    padding-bottom: 12px;
    padding-left: 16px;
    border-radius: 16px;
    background-color: #FFCC32;
    text-align: center;
  }

  .sub-title {
    font-family: ERBAUMREGULAR;
    font-weight: 400;
    font-size: 32px;
    line-height: 40px;
    letter-spacing: 0%;
    vertical-align: middle;
  }

  #calc-multistep-form button {
    border-radius: 16px;
    font-size: 18px;
    padding: 16px;
    font-weight: bold;
    min-width: 260px;
    text-align: center;
  }

  #calc-multistep-form button.prev-step {
    border: 1px solid #BEBEBE;
    color: black;
    background-color: white;
  }

  #calc-multistep-form button.next-step,
  #calc-multistep-form button[type='submit'] {
    color: white;
    background-color: black;
  }

  #calc-multistep-form .form-actions {
    margin-top: 20px;
    display: flex;
    justify-content: end;
    gap: 16px;
  }

  #calc-multistep-form input {
    display: flex;
    padding: 8px 12px;
    align-items: center;
    gap: 8px;
    align-self: stretch;
    border-radius: 12px;
    border: 1px solid #BEBEBE;
    background: white;
    width: 100%;
    height: 48px;
  }

  #calc-multistep-form textarea {
    display: flex;
    height: 30px;
    padding: 8px 12px;
    align-items: center;
    gap: 8px;
    align-self: stretch;
    border-radius: 12px;
    border: 1px solid #BEBEBE;
    background: white;
    width: 100%;
  }

  #calc-multistep-form textarea {
    min-height: 150px;
  }

  #calc-multistep-form input[type=checkbox] {
    height: 24px !important;
    padding: 4px 8px !important;
    display: inline-block;
    width: 24px;
  }

  #calc-multistep-form input[type="checkbox"]:checked {
    accent-color: black;
  }

  #calc-multistep-form .input-label.input-checkbox {
    display: flex;
    gap: 12px;
  }

  #calc-multistep-form .input-label.input-checkbox input {
    order: -1;
  }

  #calc-multistep-form input[type=radio] {
    height: 18px !important;
    width: 18px;
    padding: 4px 8px !important;
    display: inline-block;
    top: 4px;
  }


  #calc-multistep-form .input-label.input-radio {
    display: flex;
    gap: 12px;
  }

  #calc-multistep-form .input-label.input-radio input {
    order: -1;
  }

  #calc-multistep-form h3 {
    font-family: "DegularTextBold";
    font-size: 16px;
    font-weight: bold;
  }


  #calc-multistep-form .w-1\/2 {
    display: inline-block;
    width: 48%;
  }

  .first-column {
    width: 50%;
  }

  .second-column {
    width: 48%;
    padding-left: 16px;
  }

  /* Flex container setup */
  .calc-multistep-form {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    /* Spacing between the groups */
  }

  /* First group (span full width) */
  .first-row-item {
    flex-basis: 100%;
    /* Take full width */
  }

  /* Second and third groups in the second row (side-by-side) */
  .second-row-item {
    flex-basis: 48%;
    /* Take half of the width, side by side */
  }

  /* All other groups will take full width */
  .single-column-item {
    flex-basis: 100%;
    /* Full width */
  }

  .width-half.input-wrap {
    width: 100%;
    display: inline-block;
    padding-right: 14px;
  }

  .form-actions {
    display: flex;
    justify-content: end;
  }

    

  #calc-multistep-form input[type='radio'],  #calc-multistep-form input[type='checkbox'] {
    outline: 1px solid black;
    border-radius: 0 !important;
    border: none !important;
    outline-offset: -1px;
  }

  form input[type='radio'] {
    -webkit-appearance: none;
    /* Disable default radio button appearance in WebKit browsers */
    -moz-appearance: none;
    /* Disable default radio button appearance in Firefox */
    appearance: none;
    /* Disable default radio button appearance in modern browsers */

    width: 16px;
    /* Set custom size */
    height: 16px;
    border-radius: 50%;
    /* Make it circular */
    background-color: #fff;
    /* Background color */
    border: 2px solid #ccc;
    /* Border color */
    position: relative;
    /* Position for custom icon */
    cursor: pointer;
    /* Make it clickable */
    transition: all 0.3s ease;
    /* Smooth transition for state changes */
  }

  form input[type='radio']:checked {
    background-color: #4CAF50;
    /* Change background color when checked */
    border-color: #4CAF50;
    /* Border color when checked */
  }

  form input[type='radio']:checked::before {
    content: '';
    /* Required for custom icon */
    position: absolute;
    top: 50%;
    left: 50%;
    width: 24px;
    height: 24px;
    background: url('<?php echo LANGU_THEME_URI . '/assets/icons/svg/radio.svg' ?>') no-repeat center center;
    /* Add your SVG icon */
    background-size: contain;
    transform: translate(-50%, -50%);
  }

  form input[type='radio']:focus {
    outline: none;
    /* Remove focus outline */
  }

  #calc-multistep-form .hidden {
    display: none !important;
  }

  .group-fields {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }

  .input-wrap {
    grid-column: span 2 / span 2;
    padding-right: 8px !important;
  }

  .width-half.input-wrap {
    grid-column: span 1 / span 1;
  }

  /* Make sure the layout is responsive */
  @media screen and (max-width: 768px) {

    .first-row-item,
    .second-row-item,
    .single-column-item {
      flex-basis: 100%;
      /* Stacked in a single column on small screens */
    }

    .width-half.input-wrap {
      width: 100%;
      margin: 0 !important;
    }
  }

  @media (max-width: 450px) {
    .calc-increment-btn {
      text-align: center;
      padding: 8px 16px !important;
      height: 40px;
      width: 40px;
      font-size: 24px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .calc-decrement-btn {
      padding: 8px 16px !important;
      height: 40px;
      width: 40px;
      font-size: 24px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    input.main-count {
      display: flex;
      padding: 8px 12px;
      align-items: center;
      gap: 8px;
      align-self: stretch;
      border-radius: 12px;
      border: 1px solid #BEBEBE;
      background: white;
      width: 100%;
      height: 48px;
    }

    .calc-title {
      font-size: 14px !important;
    }

    .img-wrap img {
      max-width: 44% !important;
    }

    .width-half.input-wrap,
    .input-wrap {
      grid-column: span 2 / span 2;
      margin: 8px 0 !important;
    }

    #calc-multistep-form .form-actions {
      justify-content: space-between;
      gap: 8px;
    }

    #calc-multistep-form button {
      border-radius: 16px;
      font-size: 16px;
      padding: 16px;
      font-weight: bold; 
      text-align: center;
      min-width: 50%;
      width: 100%;
    }
  }
</style>

<script>

  document.addEventListener('click', function (e) {
    if (!e.target.matches('.cpt-show-more')) return;

    const container = e.target.closest('.cpt-desc-container');
    container.querySelector('.cpt-desc-short').classList.toggle('hidden');
    container.querySelector('.cpt-desc-full').classList.toggle('hidden');
    e.target.textContent = e.target.textContent === 'Rodyti daugiau' ? 'Rodyti mažiau' : 'Rodyti daugiau';
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {

    const checkGroupContainsOnlyRadioInput = () => {
      const groups = Array.from(document.querySelectorAll(".group-fields"));
      console.log(groups)
      groups.forEach((group) => {
        if (group.querySelectorAll("input[type='radio']").length === group.querySelectorAll("input").length) {
          group.setAttribute("data-radio-only-group", true);
        }
      })
    }
    checkGroupContainsOnlyRadioInput();
    const groups = document.querySelectorAll('[data-radio-only-group="true"]');
    groups.forEach(groupEl => {
      const radios = groupEl.querySelectorAll('input[type="radio"]');
      radios.forEach(radio => {
        radio.addEventListener('click', function () {
          radios.forEach(other => {
            if (other !== radio) {
              other.checked = false;
            }
          });
        });
      });
    });
  });

</script>

<script>
  document.querySelectorAll('.required.input-wrap').forEach(label => {
    const input = label.querySelector('input');
    const labelTextDiv = label.querySelector('div');

    if (input && labelTextDiv) {
      // Add the required attribute if it's not present
      input.setAttribute('required', 'required');

      // Add the asterisk if not already added
      if (!labelTextDiv.innerHTML.includes('*')) {
        labelTextDiv.innerHTML += ' <span>*</span>';
      }
    }
  });
</script> 

<?php get_footer(); ?>