<template>
    <div>
      <h1>Editar Post</h1>
      <form @submit.prevent="submit">
        <div>
          <label for="title">Título:</label>
          <input type="text" v-model="form.title">
        </div>
        <div>
          <label for="content">Conteúdo:</label>
          <textarea v-model="form.content"></textarea>
        </div>
        <button type="submit">Atualizar</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  // Recebendo a prop "post" e inicializando o formulário
  const props = defineProps({
    post: {
      type: Object,
      required: true
    }
  });
  
  // Definindo o formulário com os valores iniciais do post
  const form = useForm({
    title: props.post.title,
    content: props.post.content
  });
  
  // Função para enviar o formulário de atualização
  function submit() {
    form.put(route('posts.update', props.post.id));
  }
  </script>
  