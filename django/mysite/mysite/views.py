from django.shortcuts import render
from django.http import HttpResponse

def  teste(request):
    return HttpResponse("Testando o django")

def cliente(request):
    return HttpResponse("pagina do cliente")

def produto(request):
    return HttpResponse("pagina de produto")

def funcionario(request):
    return HttpResponse("pagina de funcionario")
