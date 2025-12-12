<script setup>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { onMounted, ref } from 'vue';

const props = defineProps({
  modelValue: { type: String, default: "" }
});
const emit = defineEmits(["update:modelValue"]);

const editorInstance = ref(null);
const editorConfig = ref({});

onMounted(() => {
  ClassicEditor
    .create(document.querySelector('#editor'), editorConfig.value)
    .then(editor => {
      editorInstance.value = editor;
      editor.model.document.on('change:data', () => {
        emit('update:modelValue', editor.getData());
      });
      editor.setData(props.modelValue);
    })
    .catch(error => {
      console.error(error);
    });
});
</script>

<template>
  <div id="editor" class="border rounded p-2 min-h-[200px]"></div>
</template>
