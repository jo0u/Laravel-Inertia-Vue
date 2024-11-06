<template>
    <FrontendLayout>
        <Head title="Posts"/>
        <h1 class="text-2xl font-bold mb-4">Lista de Posts</h1>
        
        <!-- Botão para abrir o modal -->
        <div class="m-4">
            <button @click="showModal = true"
                    class="inline-block px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600">
                Criar Novo Post
            </button>
        </div>

        <!-- Modal para criar um novo post -->
        <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg w-1/3 p-6">
                <h2 class="text-xl font-bold mb-4">Criar Post</h2>
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Título:</label>
                        <input type="text" v-model="form.title" class="w-full px-3 py-2 border rounded-lg" placeholder="Título do post">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Conteúdo:</label>
                        <textarea v-model="form.content" class="w-full px-3 py-2 border rounded-lg" placeholder="Conteúdo do post"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button @click="closeModal" type="button" class="bg-gray-400 text-white px-4 py-2 rounded-lg mr-2 hover:bg-gray-500">
                            Cancelar
                        </button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md mt-4">
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
                        <Link :href="route('posts.edit', post.id)" class="text-blue-500 hover:text-blue-700 font-medium mr-4">Editar</Link>
                        <button @click="deletePost(post.id)" class="text-red-500 hover:text-red-700 font-medium">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </FrontendLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import { Head } from '@inertiajs/vue3';

// Controle para exibir ou ocultar o modal
const showModal = ref(false);

// Configuração do formulário usando useForm
const form = useForm({
    title: '',
    content: ''
});

// Recebendo a prop `posts`
const props = defineProps({
    posts: {
        type: Array,
        required: true,
    },
});

// Função para enviar o formulário
function submit() {
    form.post(route('posts.store'), {
        onSuccess: () => closeModal()
    });
}

// Função para deletar um post
function deletePost(id) {
    if (confirm('Tem certeza que deseja excluir este post?: ' + id)) {
        form.delete(route('posts.destroy', id));
    }
}

// Função para fechar o modal e resetar o formulário
function closeModal() {
    showModal.value = false;
    form.reset();
}
</script>
