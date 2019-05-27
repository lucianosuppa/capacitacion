"""

Tendremos una lista de numeros donde nos interesa contar
solamente los numeros impares pero usando threads. La idea
es tener 5 threads que cuenten de forma independiente numeros
impares y que al final imprimamos el total de numeros impares.

"""
import random
import threading

numeros = []
for _ in range(100):
    numeros.append(random.randint(1, 100))

class ContadorDeImpares(threading.Thread):
    
    def __init__(self,lista):
        super().__init__()
        self.total = 0
        self.lista = lista
    
    def dameTotal(self):
        return self.total

    def run(self):
        for n in len(self.lista):
            self.total += self.lista[n]
        print ('gano el caballo',threading.current_thread().getName())

#contador = []
#contador.append(ContadorDeImpares(numeros))
#contador.append(ContadorDeImpares(numeros))
#contador.append(ContadorDeImpares(numeros))
#contador.append(ContadorDeImpares(numeros))
#contador.append(ContadorDeImpares(numeros))

cont1 = ContadorDeImpares(numeros)
cont2 = ContadorDeImpares(numeros)
cont3 = ContadorDeImpares(numeros)
cont4 = ContadorDeImpares(numeros)
cont5 = ContadorDeImpares(numeros)
cont1.start() 
cont2.start() 
cont3.start() 
cont4.start() 
cont5.start() 
result = cont1.dameTotal()

#for conta in contador:
#    conta.start

#result = 0
#for conta in contador:
#    conta.join()
#    result += conta.dameTotal()

print("el total es: ", result)