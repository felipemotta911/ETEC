from django.shortcuts import render
from .models import Produto

# Create your views here.
def index(request):
    return render(request,'index.html',{'produtos':produtos})

def cadastro(request):
    return render(request,'cadastro.html')

def cadastrar(request):
    titulo = request.POST['titulo']
    descricao = request.POST['descricao']
    preco = request.POST['preco']
    Produto.objects.create(titulo=titulo, descricao=descricao, preco=preco)

    return render(request,'index.html')