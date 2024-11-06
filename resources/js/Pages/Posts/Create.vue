<template>
    <div>
      <h1>Criar Post</h1>
      <form @submit.prevent="submit">
        <div>
          <label for="title">Título:</label>
          <input type="text" v-model="form.title">
        </div>
        <div>
          <label for="content">Conteúdo:</label>
          <textarea v-model="form.content"></textarea>
        </div>
        <button type="submit">Salvar</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  // Configuração do formulário usando useForm
  const form = useForm({
    title: '',
    content: ''
  });
  
  // Função para enviar o formulário
  function submit() {
    form.post(route('posts.store'));
  }
  </script>
  