<template>
   <FrontendLayout>
    <Head title="Pots"/>
    <h1 class="text-2xl font-bold mb-4">Lista de Posts</h1>
    <div class="m-4">
        <Link :href="route('posts.create')"
              class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600">
            Criar Novo Post
        </Link>
    </div>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Título</th>
                <th class="py-3 px-6 text-left">Conteúdo</th>
                <th class="py-3 px-6 text-center">Ações</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <tr v-for="post in posts" :key="post.id" class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">{{ post.title }}</td>
                <td class="py-3 px-6 text-left">{{ post.content }}</td>
                <td class="py-3 px-6 text-center">
                    <Link :href="route('posts.edit', post.id)"
                          class="text-blue-500 hover:text-blue-700 font-medium mr-4">Editar</Link>
                    <button @click="deletePost(post.id)"
                            class="text-red-500 hover:text-red-700 font-medium">Excluir</button>
                </td>
            </tr>
        </tbody>
    </table>
</FrontendLayout>
  </template>
  
  <script setup>
  import { Link, useForm, usePage } from '@inertiajs/vue3';
  import FrontendLayout from '@/Layouts/FrontendLayout.vue';
  import {Head} from '@inertiajs/vue3'
  
  // Recebendo a prop `posts` através de `defineProps`
  const props = defineProps({
    posts: {
      type: Array,
      required: true,
    },
  });
  
  const form = useForm({});

  // Função para deletar um post
  function deletePost(id) {
  if (confirm('Tem certeza que deseja excluir este post?: ' + id)) {
    form.delete(`posts/${id}`);
  }
}
  </script>
  