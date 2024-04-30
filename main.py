import os
import discord
from discord.ext import commands, tasks
from dotenv import load_dotenv
import certifi
import datetime

_intents = discord.Intents.default()
_intents.message_content = True
bot = commands.Bot(command_prefix="$", intents=_intents)


# @bot.command()
# async def sync(ctx: commands.Context):
#     await ctx.reply("syncing...")
#     cissy = await tree.sync(guild=ctx.guild)
#     print(cissy)
#     await ctx.send("done.")


@tasks.loop(time=[datetime.time(hour=9, minute=33)])
async def cissy():
    print("Ay sorry sorry can't speak")


def init_bot():
    load_dotenv()
    os.environ["SSL_CERT_FILE"] = certifi.where()

    token = os.getenv("TOKEN")
    if token == None:
        print("TOKEN not found")
        exit(1)

    bot.run(token)


if __name__ == "__main__":
    init_bot()
