def encrypt(unencrypted_text):
    words= unencrypted_text.split()
    vowel = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U']
    encrypted_text=''
    for i in range(len(words)):
        count = 0
        for j in range(len(words[i])):
            if words[i][j] in vowel: #check for the number of vowels in the word
                count += 1
        new=''
        for j in range(len(words[i])):
            rotate = count if count>0 else 13
            if words[i][j].isalpha()==True: #skip special chars
                if words[i][j] in vowel: #vowels shall not be rotated, only be capitalized
                    new += words[i][j].upper()
                else: #consonants
                    if((ord(words[i][j])+rotate)>122): #circular queue upper boundary check (z)
                        new += chr(ord(words[i][j])+rotate-26) #circular queue magic thingy
                    else:
                        new += chr(ord(words[i][j])+rotate) #rotate normally
            else:
                new += words[i][j] #just copy special char
        encrypted_text+=(new+" ")
    return encrypted_text

def decrypt(encrypted_text):
    words= encrypted_text.split()
    vowel = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U']
    decrypted_text=''
    for i in range(len(words)):
        count = 0
        for j in range(len(words[i])):
            if words[i][j].isupper()==True and words[i][j] in vowel: #count capitalized vowels
                count += 1
        new=''
        for j in range(len(words[i])):
            rotate = count if count>0 else 13
            if words[i][j].isalpha()==True: #skip special chars
                if words[i][j].isupper()==True and words[i][j] in vowel:
                    new += words[i][j].lower()
                else: #consonants
                    if((ord(words[i][j])-rotate)<96): #circular queue lower boundary check (a)
                        new += chr(ord(words[i][j])-rotate+26) #circular queue magic thingy
                    else:
                        new += chr(ord(words[i][j])-rotate) #rotate normally
            else:
                new += words[i][j] #just copy special char
        decrypted_text+=(new+" ")
    return decrypted_text
        
text= 'one two three four five six seven, you make me feel like eleven'
# text= 'Failure is the great teacher. So let\'s teach \'em something!'
# text= 'Drink some water, reload your mags, and let\'s get back out there.'
# text= 'My power does not ebb. Ask for aid, and you shall receive.'
# text= 'If I Can\'t Save The One Small Girl In Front Of Me, How Can I Become A Hero That Saves Everyone?'
text=text.lower() #for consistency
print(text)
encrypted=encrypt(text)
print(encrypted)
decrypted=decrypt(encrypted)
print(decrypted)
