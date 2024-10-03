package main

import (
	"fmt"
	"log"
	"log/slog"
	"os"
	"os/signal"

	"github.com/bwmarrin/discordgo"
	_ "github.com/joho/godotenv/autoload"
)

func main() {
	session, err := discordgo.New(fmt.Sprintf("Bot %s", os.Getenv("DISCORD_BOT_TOKEN")))
	if err != nil {
		slog.Error(err.Error())
		return
	}

	session.AddHandler(func(s *discordgo.Session, r *discordgo.Ready) {
		slog.Info("Logged in as: %v#%v", s.State.User.Username, s.State.User.Discriminator)
	})

	err = session.Open()
	if err != nil {
		slog.Error(err.Error())
		return
	}

	err = registerCommands(session)
	if err != nil {
		slog.Error(err.Error())
		return
	}

	session.AddHandler(executeHandler)

	defer session.Close()

	stop := make(chan os.Signal, 1)
	signal.Notify(stop, os.Interrupt)
	log.Println("Press Ctrl+C to exit")
	<-stop

	if os.Getenv("DISCORD_REMOVE_COMMANDS") == "true" {
		log.Println("Removing commands...")
		// // We need to fetch the commands, since deleting requires the command ID.
		// // We are doing this from the returned commands on line 375, because using
		// // this will delete all the commands, which might not be desirable, so we
		// // are deleting only the commands that we added.
		// registeredCommands, err := s.ApplicationCommands(s.State.User.ID, *GuildID)
		// if err != nil {
		// 	log.Fatalf("Could not fetch registered commands: %v", err)
		// }

		for _, v := range registeredCommands {
			err := session.ApplicationCommandDelete(session.State.User.ID, os.Getenv("DISCORD_GUILD_ID"), v.ID)
			if err != nil {
				slog.Error("Cannot delete '%v' command: %v", v.Name, err.Error())
			}
		}
	}

	log.Println("Gracefully shutting down.")
}
