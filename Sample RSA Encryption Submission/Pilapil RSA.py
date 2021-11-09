import random

def findE(n, z):
    while(1):
        gcf=0
        e = random.randint(1, n)
        for i in range(2, n):
            if z%i==0 and e%i==0: #divisible to both = common factor
                gcf = i
        if(gcf==0): #no common
    	    break
    return e

def generateD(e, z):
    # Copied from https://github.com/Amaterazu7/rsa-python/blob/master/rsa.py  
    # my idea of generating a random R (representing Z's multiplier) and using it to derive d in (((r*z)+1)/e)
    # like in sir's example of e=7,d=223,z=120, R = 13.
    # sadly in a lot of cases, my idea outputs a float
    d = 0
    x1 = 0
    x2 = 1
    y1 = 1
    temp_phi = z

    while e > 0:
        temp1 = temp_phi//e
        temp2 = temp_phi - temp1 * e
        temp_phi = e
        e = temp2

        x = x2 - temp1 * x1
        y = d - temp1 * y1

        x2 = x1
        x1 = x
        d = y1
        y1 = y

    if temp_phi == 1:
        return d + z

def RSA_encrypt(plain, e, n):
    encrypted= list()
    print("\n| Plain Text | Number |  Cipher | Cipher Text |")
    for i in range(len(plain)):
        encrypted.append(pow(ord(plain[i]), e, n))
        print("| {:10} | {:6} |  {:6} | {:11} |".format(plain[i], ord(plain[i]), int(encrypted[i]), chr(int(encrypted[i]))))
    return encrypted

def RSA_decrypt(encrypted, d, n):
    decrypted= list()
    print("\n| Cipher |  (c^d)%n | Plain Text |")
    for i in range(len(encrypted)):
        decrypted.append(pow(encrypted[i], d, n))
        print("| {:6} | {:8} | {:10} |".format(encrypted[i], int(decrypted[i]), chr(int(decrypted[i]))))
    return decrypted

def main():
    print("Sample RSA Encryption Submission")
    print("CS 3106 - INFORMATION ASSURANCE AND SECURITY")
    print("Group 1 TTH 10:30AM - 12:00NN")
    print("by Pilapil, Clyde Vincent")

    plain ="encryption"
    p=11
    q=13

    n=p*q
    z=(p-1)*(q-1)
    e=findE(n, z)
    d=generateD(e, z)
    print("\nThe values of P and Q are: ", p, ", ", q)
    print("The values of N and Z are: ", n, ", ", z)
    print("The values of E and D are: ", e, ", ", d)
    print("Keys generated are:")
    print(" - Public  key (N,E): (", n, ", ", e, ")")
    print(" - Private key (N,D): (", n, ", ", d, ")")

    encrypted=RSA_encrypt(plain, e, n)
    decrypted=RSA_decrypt(encrypted, d, n)
	
    match=True
    for i in range(len(plain)):
        if(plain[i]!=chr(decrypted[i])):
            match=False
    
    print("RSA {}".format("Success" if match==True else "Failed"))

main()
