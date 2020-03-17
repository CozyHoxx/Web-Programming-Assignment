# Contributing

## Fork the repository
Fork the repository by clicking on the fork button on the top of this page. (This will create a copy of the repository in your account)

## Clone the repository
1. Go to you GitHub account.
2. Open forked repository.
3. Click on the clone button.
4. Click the "copy to clipboard" icon.
5. Open a terminal and run the following git command
```git clone {url you just copied}```

## Create a branch
1. Change repository directory on your computer (if you are not already there).
```cd repository-name```
2. Create a branch using the ```git checkout``` command:
```git checkout -b {my-new-branch-name}```

## Make necessary changes and commit those changes
1. Edit the code.
2. Save the file.
3. Open [Contributors.md](./Contributors.md)
4. Add your name and save the file.
5. Go to project directory and execute ```git status```. You'll see there are changes.
6. Add those changes to the branch you just created using ```git add .``` command.
7. Commit the changes using ```git commit -am '{Changes done description}'```

## Push changes to GitHub
1. Push your changes to GitHub using the command:
```git push origin {my-new-branch-name}```
 
## Submit changes for review
1. If you go to your repository on GitHub, you'll see a ```Compare & pull request``` button.
2. Click on that button.
3. Submit the pull request.

## Wait
Soon I'll be merging all your changes into the master branch of this project. You will get notifications email once the changes have been merged.

