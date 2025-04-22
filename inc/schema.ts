interface Field {
  label: { type: string };
  default_value: { type: string };
  placeholder: { type: string };
  type: { type: string };
  class: { type: string };
}

interface FieldGroup {
  title: { type: string };
  fields: Field[];
}

interface Calculator {
  title: { type: string };
  featured_image: { type: string };
  main_count: { type: number };
  group_count: { type: number };
  fields_group: FieldGroup[];
}

interface FormGroup {
  title: { type: string };
  fields_group: FieldGroup[];
}

interface Calculators {
  title: { type: string };
  content: { type: string };
  calculators: Calculator[];
  forms: FormGroup[];
  thank_message: { type: string };
}
