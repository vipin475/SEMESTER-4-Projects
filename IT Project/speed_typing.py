import pygame
from pygame.locals import *
import sys
import time
import random
from translate import Translator
# 750 x 500
    
class Game:
   
    def __init__(self):
        self.w=900
        self.h=550
        self.reset=True
        self.active = False
        self.input_text=''
        self.word = ''
        self.time_start = 0
        self.total_time = 0
        self.accuracy = '0%'
        self.results = 'Time:0 Accuracy:0 Wpm:0 '
        self.wpm = 0
        self.end = False
        self.HEAD_C = (16,227,107)  #RGB code
        self.TEXT_C = (255,255,255)
        self.RESULT_C = (227,104,16)
        
       
        pygame.init()
        self.bg = pygame.image.load('back_img.webp')
        self.bg = pygame.transform.scale(self.bg, (900,550))

        self.screen = pygame.display.set_mode((self.w,self.h))
        pygame.display.set_caption('START TYPING')
       
        
    def draw_text(self, screen, msg, y ,fsize, color):
        font = pygame.font.Font(None, fsize)
        text = font.render(msg, 1,color)
        text_rect = text.get_rect(center=(self.w/2, y))
        screen.blit(text, text_rect)
        pygame.display.update()   
        
    def get_sentence(self):
        f = open('sentences.txt').read()
        sentences = f.split('\n')
        sentence = random.choice(sentences)
        return sentence

    def show_results(self, screen):
        if(not self.end):
            #Calculate time
            self.total_time = time.time() - self.time_start
               
            #Calculate accuracy
            count = 0
            for i,c in enumerate(self.word):
                try:
                    if self.input_text[i] == c:
                        count += 1
                except:
                    pass
            self.accuracy = count/len(self.word)*100
           
            #Calculate words per minute
            self.wpm = len(self.input_text)*60/(5*self.total_time)
            self.end = True
            print(self.total_time)
                
            self.results = 'Time:'+str(round(self.total_time)) +" secs   Accuracy:"+ str(round(self.accuracy)) + "%" + '   Wpm: ' + str(round(self.wpm))

            # draw icon image
            self.time_img = pygame.image.load('Reset.png')
            self.time_img = pygame.transform.scale(self.time_img, (143,92))
            screen.blit(self.time_img, (self.w/2-220,self.h-160))
            
            self.time_img1 = pygame.image.load('exit.png')
            self.time_img1 = pygame.transform.scale(self.time_img1, (165,104))
            screen.blit(self.time_img1, (self.w/2+50,self.h-170))

            print(self.results)
            pygame.display.update()

    def run(self):
        self.reset_game()

        self.running=True
        while(self.running):
            clock = pygame.time.Clock()
            self.screen.fill((0,0,0), (120,250,650,50))
            pygame.draw.rect(self.screen,self.HEAD_C, (120,250,650,50), 2)
            # update the text of user input
            self.draw_text(self.screen, self.input_text, 274, 26,(250,250,250))
            pygame.display.update()
            for event in pygame.event.get():
                if event.type == QUIT:
                    self.running = False
                    sys.exit()
                elif event.type == pygame.MOUSEBUTTONUP:
                    x,y = pygame.mouse.get_pos()
                    # position of input box
                    if(x>=120 and x<=650 and y>=250 and y<=300):
                        self.active = True
                        self.input_text = ''
                        self.time_start = time.time() 
                     # position of reset box
                    if(x>=self.w/2-220 and x<=self.w/2-40 and y>=self.h-160 and self.end):
                        self.reset_game()
                        x,y = pygame.mouse.get_pos()
                        
                    if(x>=self.w/2+50 and x<=self.w/2+200 and y>=self.h-160 and self.end):
                        pygame.quit()
                        x,y = pygame.mouse.get_pos()
         
                        
                elif event.type == pygame.KEYDOWN:
                    if self.active and not self.end:
                        if event.key == pygame.K_RETURN:
                            print(self.input_text)
                            self.show_results(self.screen)
                            print(self.results)
                            self.draw_text(self.screen, self.results,350, 28, self.RESULT_C)  
                            self.end = True
                            
                        elif event.key == pygame.K_BACKSPACE:
                            self.input_text = self.input_text[:-1]
                        else:
                            try:
                                self.input_text += event.unicode
                            except:
                                pass
            
            pygame.display.update()
             
                
        clock.tick(60)

    def reset_game(self):
        pygame.display.update()
        time.sleep(1)
        
        self.reset=False
        self.end = False

        self.input_text=''
        self.word = ''
        self.time_start = 0
        self.total_time = 0
        self.wpm = 0
                
        # Get random sentence
        self.word = self.get_sentence()

        if (not self.word): self.reset_game()
        #drawing heading
        self.screen.fill((0,0,0))
        self.screen.blit(self.bg,(0,0))
        msg = "START TYPING"
        self.draw_text(self.screen, msg,100, 80,self.HEAD_C)
        # draw the rectangle for input box
        pygame.draw.rect(self.screen,(255,120,25), (120,250,650,50), 2)

        # text wrap
        
        # draw the sentence string
        self.draw_text(self.screen, self.word,200, 28,self.TEXT_C)
        
        pygame.display.update()
Game().run()