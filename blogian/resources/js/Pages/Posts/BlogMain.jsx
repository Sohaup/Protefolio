import { Head } from "@inertiajs/react"
export default function Blog() {
    return (
        
        <main className="absolute w-[100%] h-[100%]" style={{backgroundImage:'linear-gradient(to bottom , rgba(62, 182, 153, 1) , rgba(66, 180, 205, 1) , rgba(60, 128, 178, 1) , rgba(54, 75, 152, 1))'}}>
          
           <section></section>
           <section className="absolute w-[100%] bottom-2 left-[70%] md:left-[80%] lg:left-[85%] xl:left-[90%]">
            <button className=" w-[120px] h-[60px] bg-black text-white text-center rounded-[16px] transition-all duration-[800ms] bg-transparent hover:bg-black"><a href={route('posts.create')}>Publish A Post</a></button>
           </section>
        </main>
    )
}