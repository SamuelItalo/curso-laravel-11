<template>
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
      <h2 class="text-2xl font-semibold text-gray-700 mb-4">Abrir Chamado</h2>
  
      <form @submit.prevent="submitForm" class="space-y-4">
        <div>
          <label class="block text-gray-600 text-sm font-medium">Empresa</label>
          <input v-model="empresa" type="text" placeholder="Nome da empresa"
            class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
  
        <div>
          <label class="block text-gray-600 text-sm font-medium">Setor</label>
          <input v-model="setor" type="text" placeholder="Ex: TI, Financeiro"
            class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
  
        <div>
          <label class="block text-gray-600 text-sm font-medium">Nome</label>
          <input v-model="nome" type="text" placeholder="Seu nome"
            class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
  
        <div>
          <label class="block text-gray-600 text-sm font-medium">Descrição do Problema</label>
          <textarea v-model="descricao" placeholder="Descreva o problema..."
            class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 h-24"></textarea>
        </div>
  
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
          Enviar Chamado
        </button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        empresa: '',
        setor: '',
        nome: '',
        descricao: ''
      };
    },
    methods: {
      async submitForm() {
        const response = await fetch('/api/chamados', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            empresa: this.empresa,
            setor: this.setor,
            nome: this.nome,
            descricao: this.descricao
          })
        });
        if (response.ok) {
          alert("Chamado enviado com sucesso!");
          this.empresa = this.setor = this.nome = this.descricao = '';
        } else {
          alert("Erro ao enviar chamado.");
        }
      }
    }
  };
  </script>
  