d=input('d=')
import turtle

def carre(x,y,taille,couleur,remplissage):
    turtle.up()
    turtle.goto(x,y)
    turtle.down()
    turtle.color(couleur)
    if remplissage==1:
        turtle.begin_fill()
    for i in range(4):
        turtle.forward(taille)
        turtle.right(90)
    if remplissage==1:
        turtle.end_fill()

turtle.speed(0)
remplissage=1
for x in range(0,(int(m)-1)*10+1,10):
    for y in range(0,((int(m)-1)*10)+1,10):
        if y==(int(d)*x)%(int(m)*10):
            carre(x,y,10,'black',remplissage)
        else:
            carre(x,y,10,'black',1-remplissage)